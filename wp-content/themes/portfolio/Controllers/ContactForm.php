<?php

namespace Portfolio;

class ContactForm
{
    /**
     * Array containing teh form nonce information, etc.
     */
    protected array $config;

    /**
     * Array representing the incoming data
     */
    protected array $data;

    /**
     * The previous pages URL
     */
    protected string $referer;

    /**
     * Create a new Form controller instance.
     */
    public function __construct(array $config, array $data)
    {
        $this->config = $config;
        $this->data = $data;
        $this->referer = wp_get_referer();
    }

    /**
     * Check if the incoming request is authorized and if the data
     * is correctly formated, otherwise redirect to the previous URL
     * in order to display the validation errors
     */
    public function validate(array $rules): static
    {
        if (! $this->verifyNonce()) {
            die('Invalid request.');
        }

        if ($errors = $this->applyValidationRules($rules)){
            portfolio_session_flash($this->config['nonce_identifier'] . '_errors', $errors);
            // la validation ne passe , ducoup message d'erreur
            wp_safe_redirect($this->referer);
            exit;
        }

        return $this;
    }

    protected function verifyNonce(): bool
    {
        $nonce = $this->data[$this->config['nonce_field']] ?? null;
        $identifier = $this->config['nonce_identifier'];

        return (wp_verify_nonce($nonce, $identifier) === 1);
    }

    protected function applyValidationRules(array $rules): array
    {
        $errors = [];

        foreach($rules as $field => $checks) {
            $value = $this->data[$field] ?? null;
            $errors[$field] = $this->applyFiledValidation($field, $value, $checks);
        }

        return array_filter($errors);
    }

    protected function applyFiledValidation(string $field, mixed $value, array $rules): ?string
    {
        foreach ($rules as $rule) {
            $check = 'check' . ucfirst($rule);
            $errorMessage = 'get' . ucfirst($rule) . 'ErrorMessage';

            $error = $this->$check($field, $value)
                ? false
                : $this->$errorMessage($field);

            if ($error) return $error;
        }

        return null;
    }

    protected function checkRequired(string $field, mixed $value): bool
    {
        return ($value || $value === 0);
    }

    protected function getRequiredErrorMessage(string $field): string
    {
        return 'Le champ ' . $field . ' est requis.';
    }

    protected function checkEmail(string $field, mixed $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    protected function getEmailErrorMessage(string $field): string
    {
        return 'Veuillez fournir une adresse mail valide';
    }

    /**
     * Cleanup the data values
     */
    public function sanitize(array $methods):static
    {
        foreach ($methods as $field => $method){
            $method = 'sanitize_'. $method;
            $this->data[$field] = $method($this->data[$field] ?? '');
        }

        return $this;
    }

    /**
     * Insert the form data in the wordpress database
     */
    public function save(callable $title, callable $content): static
    {
        wp_insert_post([
            'post_type' => 'message',
            'post_status' => 'publish',
            'post_title' => $title($this->data),
            'post_content' => $content($this->data),
        ]);

        return $this;
    }

    /**
     * Send the form data in an email
     */
    public function send(callable $title, callable $content): static
    {
        wp_mail(get_bloginfo('admin_email'), $title, $content);

        return $this;
    }

    /**
     * Redirect to the previous URL in order to display
     * a feedback message
     */
    public function feedback(): void
    {
        portfolio_session_flash($this->config['nonce_identifier'] . '_feedback', true);
        wp_safe_redirect($this->referer);
        exit;
    }
}
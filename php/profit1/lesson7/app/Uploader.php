<?php

class Uploader
{
    protected $formName;

    public function __construct(string $formName)
    {
        $this->formName = $formName;
    }

    public function isUploaded(): bool
    {
        return isset($_FILES[$this->formName]);
    }

    public function upload(): void
    {
        if ($this->isUploaded() && (0 === $_FILES[$this->formName]['error'])) {
            if ('image/jpeg' == $_FILES[$this->formName]['type'] || 'image/png' == $_FILES[$this->formName]['type']) {
                move_uploaded_file(
                    $_FILES[$this->formName]['tmp_name'],
                    __DIR__ . '/../img/' . $_FILES[$this->formName]['name']
                );
            }
        }
    }
}

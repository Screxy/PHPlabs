<?php

interface Field
{
    public function __construct();

    public function getFieldNames();

    public function getFieldId(): string;

    public function getAllHashtagName();

    public function deleteField();

    public function deleteHashtag(string $hashtagId);

    public function deleteFieldHashtag(string $fieldId);

}
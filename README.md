# PHP-HTML
Create forms with PHP

## Installation

Install with composer:
```bash
$ composer require progphil1337/php-forms
```

## Compatibility

`ProgPhil1337\Forms` requires PHP 8.1 (or better).

## Usage


### Basic example
ExampleForm.php

```php
use ProgPhil1337\Forms\Element\Input;
use ProgPhil1337\Forms\Element\Radio;
use ProgPhil1337\Forms\Element\Select;
use ProgPhil1337\Forms\Enum\InputType;
use ProgPhil1337\Forms\Form;
use ProgPhil1337\Forms\Validation\Validator\MaxLength;
use ProgPhil1337\Forms\Validation\Validator\MinLength;
use ProgPhil1337\Forms\Validation\Validator\IsRequired;
use ProgPhil1337\Forms\Enum\RequestMethod;

class ExampleForm extends Form
{

    public function __construct()
    {
        parent::__construct('example-form', RequestMethod::POST);
    }

    protected function build(): void
    {
        $username = new Input('username', InputType::TEXT, 'Username');
        $username->addValidator(new MaxLength(1));
        $username->addValidator(new MinLength(1));
        $username->addValidator(new IsRequired(true));
        $this->add($username);

        $mail = new Input('mail', InputType::EMAIL, 'E-Mail');
        $this->add($mail);

        $radio = new Radio('language', [
            'php' => 'PHP',
            'csharp' => 'C-Sharp'
        ], 'Favorite Language');
        $radio->setValue('php');
        $this->add($radio);

        $select = new Select('car', [
            'volvo' => 'Volvo',
            'vw' => 'VW',
            'bmw' => 'BMW',
            'audi' => 'Audi'
        ], 'Favorite car');

        $select->setValue('audi'); // obviously
        $this->add($select);

        $this->submitButton('Speichern');
    }
}
```

SomeHandler.php
```php 
$form = new ExampleForm();

$form->setDefaultValues([
    'mail' => 'example@mail.com'
]);

$errorMessages = [];

if ($request->method->value === $form->method->value) {
    $result = $form->validate($request->body);
    $valid = $result->isValid();

    if (!$valid) {
        foreach ($result->getErrorMessages() as $inputName => $validators) {
            $errorMessages[$inputName] = [];
            foreach ($validators as $info) {
                $errorMessages[$inputName][] = $info['message'];
            }
        }
    }
}

someRenderFunction('someTemplate.twig', [
    'form' => $form,
    'errorMessages' => $errorMessages
])
```
someTemplate.twig
```twig 
{{ form.openTag()|raw }}
{{ errorMessages["username"]|join('<br />') }}
{{ form.get("username").label|raw }}<br />
{{ form.get("username").element|raw }}<br />
<br />
{{ errorMessages["mail"]|join('<br />') }}
{{ form.get("mail").label|raw }}<br />
{{ form.get("mail")|raw }}<br />
...

{{ form.get("submit").element|raw }}
{{ form.closeTag()|raw }}

{# you can also just do form|raw to auto generate the html #}

{{ form|raw }}
```
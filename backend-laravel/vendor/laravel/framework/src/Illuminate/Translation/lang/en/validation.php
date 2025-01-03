<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'O campo :attribute deve ser aceito.',
    'accepted_if' => 'O :attribute deve ser aceito quando :other for :value.',
    'active_url' => 'O campo :attribute deve conter uma URL válida.',
    'after' => 'O campo :attribute deve conter uma data posterior a :date.',
    'after_or_equal' => 'O campo :attribute deve conter uma data superior ou igual a :date.',
    'alpha' => 'O campo :attribute deve conter apenas letras.',
    'alpha_dash' => 'O campo :attribute deve conter apenas letras, números e traços.',
    'alpha_num' => 'O campo :attribute deve conter apenas letras e números .',
    'array' => 'O campo :attribute deve conter um array.',
    'ascii' => 'O :attribute deve conter apenas caracteres alfanuméricos de byte único e símbolos.',
    'attached' => 'Este :attribute já está anexado.',
    'before' => 'O campo :attribute deve conter uma data anterior a :date.',
    'before_or_equal' => 'O campo :attribute deve conter uma data inferior ou igual a :date.',
    'between.array' => 'O campo :attribute deve conter de :min a :max itens.',
    'between.file' => 'O campo :attribute deve conter um arquivo de :min a :max kilobytes.',
    'between.numeric' => 'O campo :attribute deve conter um número entre :min e :max.',
    'between.string' => 'O campo :attribute deve conter entre :min a :max caracteres.',
    'boolean' => 'O campo :attribute deve conter o valor verdadeiro ou falso.',
    'can' => 'O campo :attribute contém um valor não autorizado.',
    'confirmed' => 'A confirmação para o campo :attribute não coincide.',
    'contains' => 'O campo :attribute não contém um valor obrigatório.',
    'current_password' => 'A senha está incorreta.',
    'date' => 'O campo :attribute não contém uma data válida.',
    'date_equals' => 'O campo :attribute deve ser uma data igual a :date.',
    'date_format' => 'A data informada para o campo :attribute não respeita o formato :format.',
    'decimal' => 'O :attribute deve ter :decimal casas decimais.',
    'declined' => 'O :attribute deve ser recusado.',
    'declined_if' => 'O :attribute deve ser recusado quando :other for :value.',
    'different' => 'Os campos :attribute e :other devem conter valores diferentes.',
    'digits' => 'O campo :attribute deve conter :digits dígitos.',
    'digits_between' => 'O campo :attribute deve conter entre :min a :max dígitos.',
    'dimensions' => 'O valor informado para o campo :attribute não é uma dimensão de imagem válida.',
    'distinct' => 'O campo :attribute contém um valor duplicado.',
    'doesnt_end_with' => 'O :attribute não pode terminar com um dos seguintes: :values.',
    'doesnt_start_with' => 'O :attribute não pode começar com um dos seguintes: :values.',
    'email' => 'O campo :attribute não contém um endereço de email válido.',
    'ends_with' => 'O campo :attribute deve terminar com um dos seguintes valores: :values',
    'enum' => 'O :attribute selecionado é inválido.',
    'exists' => 'O valor selecionado para o campo :attribute é inválido.',
    'extensions' => 'O campo :attribute deve ter uma das seguintes extensões: :values.',
    'failed' => 'Credenciais informadas não correspondem com nossos registros.',
    'file' => 'O campo :attribute deve conter um arquivo.',
    'filled' => 'O campo :attribute é obrigatório.',
    'gt.array' => 'O campo :attribute deve ter mais que :value itens.',
    'gt.file' => 'O arquivo :attribute deve ser maior que :value kilobytes.',
    'gt.numeric' => 'O campo :attribute deve ser maior que :value.',
    'gt.string' => 'O campo :attribute deve ser maior que :value caracteres.',
    'gte.array' => 'O campo :attribute deve ter :value itens ou mais.',
    'gte.file' => 'O arquivo :attribute deve ser maior ou igual a :value kilobytes.',
    'gte.numeric' => 'O campo :attribute deve ser maior ou igual a :value.',
    'gte.string' => 'O campo :attribute deve ser maior ou igual a :value caracteres.',
    'hex_color' => 'O campo :attribute deve ter uma cor hexadecimal válida.',
    'image' => 'O campo :attribute deve conter uma imagem.',
    'in' => 'O campo :attribute não contém um valor válido.',
    'in_array' => 'O campo :attribute não existe em :other.',
    'integer' => 'O campo :attribute deve conter um número inteiro.',
    'ip' => 'O campo :attribute deve conter um IP válido.',
    'ipv4' => 'O campo :attribute deve conter um IPv4 válido.',
    'ipv6' => 'O campo :attribute deve conter um IPv6 válido.',
    'json' => 'O campo :attribute deve conter uma string JSON válida.',
    'list' => 'O campo :attribute deve ser uma lista.',
    'lowercase' => 'O :attribute deve ser minúsculo.',
    'lt.array' => 'O campo :attribute deve ter menos que :value itens.',
    'lt.file' => 'O arquivo :attribute ser menor que :value kilobytes.',
    'lt.numeric' => 'O campo :attribute deve ser menor que :value.',
    'lt.string' => 'O campo :attribute deve ser menor que :value caracteres.',
    'lte.array' => 'O campo :attribute não deve ter mais que :value itens.',
    'lte.file' => 'O arquivo :attribute ser menor ou igual a :value kilobytes.',
    'lte.numeric' => 'O campo :attribute deve ser menor ou igual a :value.',
    'lte.string' => 'O campo :attribute deve ser menor ou igual a :value caracteres.',
    'mac_address' => 'O :attribute deve ser um endereço MAC válido.',
    'max.array' => 'O campo :attribute deve conter no máximo :max itens.',
    'max.file' => 'O campo :attribute não pode conter um arquivo com mais de :max kilobytes.',
    'max.numeric' => 'O campo :attribute não pode conter um valor superior a :max.',
    'max.string' => 'O campo :attribute não pode conter mais de :max caracteres.',
    'max_digits' => 'O :attribute não deve ter mais que :max dígitos.',
    'mimes' => 'O campo :attribute deve conter um arquivo do tipo: :values.',
    'mimetypes' => 'O campo :attribute deve conter um arquivo do tipo: :values.',
    'min.array' => 'O campo :attribute deve conter no mínimo :min itens.',
    'min.file' => 'O campo :attribute deve conter um arquivo com no mínimo :min kilobytes.',
    'min.numeric' => 'O campo :attribute deve conter um número superior ou igual a :min.',
    'min.string' => 'O campo :attribute deve conter no mínimo :min caracteres.',
    'min_digits' => 'O :attribute deve ter pelo menos :min dígitos.',
    'missing' => 'O campo :attribute deve estar ausente.',
    'missing_if' => 'O campo :attribute deve estar ausente quando :other for :value.',
    'missing_unless' => 'O campo :attribute deve estar ausente, a menos que :other seja :value.',
    'missing_with' => 'O campo :attribute deve estar ausente quando :values estiver presente.',
    'missing_with_all' => 'O campo :attribute deve estar ausente quando :values estiverem presentes.',
    'multiple_of' => 'O :attribute deve ser um múltiplo de :value',
    'next' => 'Próxima &raquo;',
    'not_in' => 'O campo :attribute contém um valor inválido.',
    'not_regex' => 'O formato do valor :attribute é inválido.',
    'numeric' => 'O campo :attribute deve conter um valor numérico.',
    'password' => 'A senha está incorreta.',
    'password.letters' => 'O :attribute deve conter pelo menos uma letra.',
    'password.mixed' => 'O :attribute deve conter pelo menos uma letra maiúscula e uma minúscula.',
    'password.numbers' => 'O :attribute deve conter pelo menos um número.',
    'password.symbols' => 'O :attribute deve conter pelo menos um símbolo.',
    'password.uncompromised' => 'O dado :attribute apareceu em um vazamento de dados. Por favor, escolha um :attribute diferente.',
    'present' => 'O campo :attribute deve estar presente.',
    'present_if' => 'O campo :attribute deve estar presente quando :other for :value.',
    'present_unless' => 'O campo :attribute deve estar presente, a menos que :other seja :value.',
    'present_with' => 'O campo :attribute deve estar presente quando :values estiver presente.',
    'present_with_all' => 'O campo :attribute deve estar presente quando :values estiverem presentes.',
    'previous' => '&laquo; Anterior',
    'prohibited' => 'O campo :attribute é proibido.',
    'prohibited_if' => 'O campo :attribute é proibido quando :other é :value.',
    'prohibited_unless' => 'O campo :attribute é proibido a menos que :other esteja em :values.',
    'prohibits' => 'O campo :attribute proíbe :other de estar presente.',
    'regex' => 'O formato do valor informado no campo :attribute é inválido.',
    'relatable' => 'Este :attribute pode não estar associado a este recurso.',
    'required' => 'O campo :attribute é obrigatório.',
    'required_array_keys' => 'O campo :attribute deve conter entradas para: :values',
    'required_if' => 'O campo :attribute é obrigatório quando o valor do campo :other é igual a :value.',
    'required_if_accepted' => 'O campo :attribute é obrigatório quando :other é aceito.',
    'required_if_declined' => 'O campo :attribute é obrigatório quando :other não for informado.',
    'required_unless' => 'O campo :attribute é obrigatório a menos que :other esteja presente em :values.',
    'required_with' => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_with_all' => 'O campo :attribute é obrigatório quando um dos :values está presente.',
    'required_without' => 'O campo :attribute é obrigatório quando :values não está presente.',
    'required_without_all' => 'O campo :attribute é obrigatório quando nenhum dos :values está presente.',
    'reset' => 'Sua senha foi redefinida!',
    'same' => 'Os campos :attribute e :other devem conter valores iguais.',
    'sent' => 'Enviamos um link para redefinir a sua senha por e-mail.',
    'size.array' => 'O campo :attribute deve conter :size itens.',
    'size.file' => 'O campo :attribute deve conter um arquivo com o tamanho de :size kilobytes.',
    'size.numeric' => 'O campo :attribute deve conter o número :size.',
    'size.string' => 'O campo :attribute deve conter :size caracteres.',
    'starts_with' => 'O campo :attribute deve começar com um dos seguintes valores: :values',
    'string' => 'O campo :attribute deve ser uma string.',
    'throttle' => 'Você realizou muitas tentativas de login. Por favor, tente novamente em :seconds segundos.',
    'throttled' => 'Por favor espere antes de tentar novamente.',
    'timezone' => 'O campo :attribute deve conter um fuso horário válido.',
    'token' => 'Esse código de redefinição de senha é inválido.',
    'ulid' => 'O :attribute deve ser um ULID válido.',
    'unique' => 'O valor informado para o campo :attribute já está em uso.',
    'uploaded' => 'Falha no Upload do arquivo :attribute.',
    'uppercase' => 'O :attribute deve ser maiúsculo.',
    'url' => 'O formato da URL informada para o campo :attribute é inválido.',
    'user' => 'Não conseguimos encontrar nenhum usuário com o endereço de e-mail informado.',
    'uuid' => 'O campo :attribute deve ser um UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];

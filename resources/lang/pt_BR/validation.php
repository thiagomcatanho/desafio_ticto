<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mensagens de validação padrão
    |--------------------------------------------------------------------------
    */
    'accepted'             => 'O campo :attribute deve ser aceito.',
    'active_url'           => 'O campo :attribute não é uma URL válida.',
    'after'                => 'O campo :attribute deve ser uma data posterior a :date.',
    'after_or_equal'       => 'O campo :attribute deve ser uma data posterior ou igual a :date.',
    'alpha'                => 'O campo :attribute deve conter apenas letras.',
    'alpha_dash'           => 'O campo :attribute deve conter apenas letras, números e traços.',
    'alpha_num'            => 'O campo :attribute deve conter apenas letras e números.',
    'array'                => 'O campo :attribute deve ser um array.',
    'before'               => 'O campo :attribute deve ser uma data anterior a :date.',
    'before_or_equal'      => 'O campo :attribute deve ser uma data anterior ou igual a :date.',
    'between'              => [
        'numeric' => 'O campo :attribute deve estar entre :min e :max.',
        'file'    => 'O arquivo :attribute deve ter entre :min e :max kilobytes.',
        'string'  => 'O campo :attribute deve ter entre :min e :max caracteres.',
        'array'   => 'O campo :attribute deve ter entre :min e :max itens.',
    ],
    'boolean'              => 'O campo :attribute deve ser verdadeiro ou falso.',
    'confirmed'            => 'A confirmação de :attribute não confere.',
    'date'                 => 'O campo :attribute não é uma data válida.',
    'date_format'          => 'O campo :attribute não corresponde ao formato :format.',
    'different'            => 'Os campos :attribute e :other devem ser diferentes.',
    'digits'               => 'O campo :attribute deve ter :digits dígitos.',
    'digits_between'       => 'O campo :attribute deve ter entre :min e :max dígitos.',
    'dimensions'           => 'O campo :attribute possui dimensões de imagem inválidas.',
    'distinct'             => 'O campo :attribute possui valor duplicado.',
    'email'                => 'O campo :attribute deve ser um endereço de e-mail válido.',
    'exists'               => 'O :attribute selecionado é inválido.',
    'file'                 => 'O campo :attribute deve ser um arquivo.',
    'filled'               => 'O campo :attribute é obrigatório.',
    'gt'                   => [
        'numeric' => 'O campo :attribute deve ser maior que :value.',
        'file'    => 'O arquivo :attribute deve ser maior que :value kilobytes.',
        'string'  => 'O campo :attribute deve ter mais que :value caracteres.',
        'array'   => 'O campo :attribute deve ter mais que :value itens.',
    ],
    'gte'                  => [
        'numeric' => 'O campo :attribute deve ser maior ou igual a :value.',
        'file'    => 'O arquivo :attribute deve ter no mínimo :value kilobytes.',
        'string'  => 'O campo :attribute deve ter no mínimo :value caracteres.',
        'array'   => 'O campo :attribute deve ter no mínimo :value itens.',
    ],
    'image'                => 'O campo :attribute deve ser uma imagem.',
    'in'                   => 'O :attribute selecionado é inválido.',
    'in_array'             => 'O campo :attribute não existe em :other.',
    'integer'              => 'O campo :attribute deve ser um número inteiro.',
    'ip'                   => 'O campo :attribute deve ser um endereço IP válido.',
    'ipv4'                 => 'O campo :attribute deve ser um endereço IPv4 válido.',
    'ipv6'                 => 'O campo :attribute deve ser um endereço IPv6 válido.',
    'json'                 => 'O campo :attribute deve ser uma string JSON válida.',
    'lt'                   => [
        'numeric' => 'O campo :attribute deve ser menor que :value.',
        'file'    => 'O arquivo :attribute deve ser menor que :value kilobytes.',
        'string'  => 'O campo :attribute deve ter menos que :value caracteres.',
        'array'   => 'O campo :attribute deve ter menos que :value itens.',
    ],
    'lte'                  => [
        'numeric' => 'O campo :attribute deve ser menor ou igual a :value.',
        'file'    => 'O arquivo :attribute deve ter no máximo :value kilobytes.',
        'string'  => 'O campo :attribute deve ter no máximo :value caracteres.',
        'array'   => 'O campo :attribute deve ter no máximo :value itens.',
    ],
    'max'                  => [
        'numeric' => 'O campo :attribute não pode ser maior que :max.',
        'file'    => 'O arquivo :attribute não pode ser maior que :max kilobytes.',
        'string'  => 'O campo :attribute não pode ter mais que :max caracteres.',
        'array'   => 'O campo :attribute não pode ter mais que :max itens.',
    ],
    'mimes'                => 'O arquivo :attribute deve ser do tipo: :values.',
    'mimetypes'            => 'O arquivo :attribute deve ser do tipo: :values.',
    'min'                  => [
        'numeric' => 'O campo :attribute deve ser no mínimo :min.',
        'file'    => 'O arquivo :attribute deve ter no mínimo :min kilobytes.',
        'string'  => 'O campo :attribute deve ter no mínimo :min caracteres.',
        'array'   => 'O campo :attribute deve ter no mínimo :min itens.',
    ],
    'not_in'               => 'O :attribute selecionado é inválido.',
    'not_regex'            => 'O formato do :attribute é inválido.',
    'numeric'              => 'O campo :attribute deve ser um número.',
    'password'             => 'A senha está incorreta.',
    'present'              => 'O campo :attribute deve estar presente.',
    'regex'                => 'O formato do :attribute é inválido.',
    'required'             => 'O campo :attribute é obrigatório.',
    'required_if'          => 'O campo :attribute é obrigatório quando :other for :value.',
    'required_unless'      => 'O campo :attribute é obrigatório, a menos que :other esteja em :values.',
    'required_with'        => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_with_all'    => 'O campo :attribute é obrigatório quando todos :values estão presentes.',
    'required_without'     => 'O campo :attribute é obrigatório quando :values não está presente.',
    'required_without_all' => 'O campo :attribute é obrigatório quando nenhum dos :values está presente.',
    'same'                 => 'Os campos :attribute e :other devem coincidir.',
    'size'                 => [
        'numeric' => 'O campo :attribute deve ter :size.',
        'file'    => 'O arquivo :attribute deve ter :size kilobytes.',
        'string'  => 'O campo :attribute deve ter :size caracteres.',
        'array'   => 'O campo :attribute deve conter :size itens.',
    ],
    'string'               => 'O campo :attribute deve ser uma string.',
    'timezone'             => 'O campo :attribute deve ser um fuso horário válido.',
    'unique'               => 'O valor do campo :attribute já está em uso.',
    'uploaded'             => 'Falha ao enviar o arquivo :attribute.',
    'url'                  => 'O formato do :attribute é inválido.',

    /*
    |--------------------------------------------------------------------------
    | Mensagens customizadas
    |--------------------------------------------------------------------------
    */
    'custom' => [
        'email' => [
            'required' => 'O campo e-mail é obrigatório.',
            'email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
            'unique' => 'Este e-mail já está cadastrado.',
        ],
        'password' => [
            'required' => 'O campo senha é obrigatório.',
            'min' => 'A senha deve ter no mínimo :min caracteres.',
            'confirmed' => 'A confirmação da senha não confere.',
        ],
        'document' => [
            'required' => 'O CPF é obrigatório.',
            'unique' => 'Este CPF já está em uso.',
            'invalid' => 'CPF invalido'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Atributos personalizados
    |--------------------------------------------------------------------------
    */
    'attributes' => [
        'name' => 'nome',
        'email' => 'e-mail',
        'password' => 'senha',
        'password_confirmation' => 'confirmação da senha',
        'document' => 'CPF',
        'birth_date' => 'data de nascimento',
        'zip_code' => 'CEP',
        'street' => 'rua',
        'number' => 'número',
        'neighborhood' => 'bairro',
        'city' => 'cidade',
        'state' => 'estado',
        'position' => 'cargo',
    ],

];

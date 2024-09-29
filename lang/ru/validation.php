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

    'accepted' => ':attribute должно быть принято.',
    'accepted_if' => ':attribute должно быть принято, когда :other равно :value.',
    'active_url' => ':attribute не является допустимым URL.',
    'after' => ':attribute должно быть датой после :date.',
    'after_or_equal' => ':attribute должно быть датой после или равной :date.',
    'alpha' => ':attribute может содержать только буквы.',
    'alpha_dash' => ':attribute может содержать только буквы, цифры, тире и подчеркивания.',
    'alpha_num' => ':attribute может содержать только буквы и цифры.',
    'array' => ':attribute должно быть массивом.',
    'before' => ':attribute должно быть датой перед :date.',
    'before_or_equal' => ':attribute должно быть датой перед или равной :date.',
    'between' => [
        'numeric' => ':attribute должно быть между :min и :max.',
        'file' => ':attribute должно быть между :min и :max килобайт.',
        'string' => ':attribute должно быть между :min и :max символами.',
        'array' => ':attribute должно содержать от :min до :max элементов.',
    ],
    'boolean' => ':attribute поле должно быть true или false.',
    'confirmed' => ':attribute не совпадает с подтверждением.',
    'current_password' => 'Пароль неверен.',
    'date_past' => ' :attribute прошедшая.',
    'date' => ':attribute не является допустимой датой.',
    'date_equals' => ':attribute должно быть равным :date.',
    'date_format' => ':attribute не соответствует формату :format.',
    'declined' => ':attribute должно быть отклонено.',
    'declined_if' => ':attribute должно быть отклонено, когда :other равно :value.',
    'different' => ':attribute и :other должны различаться.',
    'digits' => ':attribute должно быть :digits цифрами.',
    'digits_between' => ':attribute должно быть между :min и :max цифрами.',
    'dimensions' => ':attribute имеет недопустимые размеры изображения.',
    'distinct' => ':attribute поле имеет повторяющееся значение.',
    'email' => ':attribute должно быть действительным адресом электронной почты.',
    'ends_with' => ':attribute должно заканчиваться на одно из следующих значений: :values.',
    'enum' => 'Выбранное :attribute недействительно.',
    'exists' => 'Выбранное :attribute недействительно.',
    'file' => ':attribute должно быть файлом.',
    'filled' => ':attribute поле должно содержать значение.',
    'gt' => [
        'numeric' => ':attribute должно быть больше :value.',
        'file' => ':attribute должно быть больше :value килобайт.',
        'string' => ':attribute должно быть длиннее :value символов.',
        'array' => ':attribute должно содержать больше :value элементов.',
    ],
    'gte' => [
        'numeric' => ':attribute должно быть больше или равно :value.',
        'file' => ':attribute должно быть больше или равно :value килобайт.',
        'string' => ':attribute должно быть больше или равно :value символов.',
        'array' => ':attribute должно содержать :value элементов или больше.',
    ],
    'image' => ':attribute должно быть изображением.',
    'in' => 'Выбранное :attribute недействительно.',
    'in_array' => ':attribute поле не существует в :other.',
    'integer' => ':attribute должно быть целым числом.',
    'ip' => ':attribute должно быть действительным IP-адресом.',
    'ipv4' => ':attribute должно быть действительным IPv4-адресом.',
    'ipv6' => ':attribute должно быть действительным IPv6-адресом.',
    'json' => ':attribute должно быть действительной JSON-строкой.',
    'lt' => [
        'numeric' => ':attribute должно быть меньше :value.',
        'file' => ':attribute должно быть меньше :value килобайт.',
        'string' => ':attribute должно быть короче :value символов.',
        'array' => ':attribute должно содержать меньше :value элементов.',
    ],
    'lte' => [
        'numeric' => ':attribute должно быть меньше или равно :value.',
        'file' => ':attribute должно быть меньше или равно :value килобайт.',
        'string' => ':attribute должно быть короче или равно :value символов.',
        'array' => ':attribute не должно содержать больше чем :value элементов.',
    ],
    'mac_address' => ':attribute должно быть действительным MAC-адресом.',
    'max' => [
        'numeric' => ':attribute не может быть больше чем :max.',
        'file' => ':attribute не может быть больше чем :max килобайт.',
        'string' => ':attribute не может быть больше чем :max символов.',
        'array' => ':attribute не может содержать больше чем :max элементов.',
    ],
    'mimes' => ':attribute должно быть файлом типа: :values.',
    'mimetypes' => ':attribute должно быть файлом типа: :values.',
    'min' => [
        'numeric' => ':attribute должно быть не менее :min.',
        'file' => ':attribute должно быть не менее :min килобайт.',
        'string' => ':attribute должно быть не менее :min символов.',
        'array' => ':attribute должно содержать как минимум :min элементов.',
    ],
    'multiple_of' => ':attribute должно быть кратным :value.',
    'not_in' => 'Выбранное :attribute недействительно.',
    'not_regex' => 'Формат :attribute недействителен.',
    'numeric' => ':attribute должно быть числом.',
    'password' => 'Пароль неверен.',
    'present' => ':attribute поле должно быть присутствующим.',
    'prohibited' => ':attribute поле запрещено.',
    'prohibited_if' => ':attribute поле запрещено, когда :other равно :value.',
    'prohibited_unless' => ':attribute поле запрещено, если :other не входит в :values.',
    'prohibits' => ':attribute поле запрещает :other быть присутствующим.',
    'regex' => 'Формат :attribute недействителен.',
    'required' => ':attribute является обязательным.',
    'required_array_keys' => ':attribute поле должно содержать записи для: :values.',
    'required_if' => ':attribute поле обязательно, когда :other равно :value.',
    'required_unless' => ':attribute поле обязательно, если :other не входит в :values.',
    'required_with' => ':attribute поле обязательно, когда :values присутствует.',
    'required_with_all' => ':attribute поле обязательно, когда все :values присутствуют.',
    'required_without' => ':attribute поле обязательно, когда :values отсутствует.',
    'required_without_all' => ':attribute поле обязательно, когда ни одно из :values не присутствует.',
    'same' => ':attribute и :other должны совпадать.',
    'size' => [
        'numeric' => ':attribute должно быть :size.',
        'file' => ':attribute должно быть :size килобайт.',
        'string' => ':attribute должно быть :size символов.',
        'array' => ':attribute должно содержать :size элементов.',
    ],
    'starts_with' => ':attribute должно начинаться с одного из следующих значений: :values.',
    'string' => ':attribute должно быть строкой.',
    'timezone' => ':attribute должно быть действительным часовым поясом.',
    'unique' => ':attribute уже занято.',
    'uploaded' => ':attribute не удалось загрузить.',
    'url' => ':attribute должно быть действительным URL.',
    'uuid' => ':attribute должно быть действительным UUID.',

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

    'attributes' => [
        'email' => 'Почта',
        'password' => 'Пароль',
        'phone_number' => 'Телефон',
        'first_name' => 'Имя',
        'last_name' => 'Фамилия',
        'organization' => 'Организация',
        'client_type_id' => 'Тип клиента',
    ],
];

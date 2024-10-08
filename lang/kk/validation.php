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

    'accepted' => ' :attribute қабылдануы керек.',
    'accepted_if' => ':атрибут :other :value болғанда қабылдануы керек.',
    'active_url' => ' :attribute жарамды URL мекенжайы емес.',
    'after' => ' :attribute мәні :date күнінен кейінгі күн болуы керек.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => ' :attribute тек әріптерден тұруы керек.',
    'alpha_dash' => ' :attribute тек әріптерден, сандардан және сызықшалардан тұруы керек.',
    'alpha_num' => ' :attribute тек әріптерден және сандардан тұруы керек.',
    'array' => ' :attribute жиын болуы керек.',
    'before' => ' :attribute мәні :date күнінен кейінгі күн болуы керек.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => ' :attribute мәні :min және :max аралығында болуы керек.',
        'file' => ' :attribute көлемі :min және :max килобайт аралығында болуы керек.',
        'string' => ' :attribute тармағы :min және :max аралығындағы таңбалардан тұруы керек.',
        'array' => ' :attribute жиымы :min және :max аралығындағы элементтерден тұруы керек.',
    ],
    'boolean' => ' :attribute жолы шын немесе жалған мән болуы керек.',
    'confirmed' => ' :attribute растауы сәйкес емес.',
    'current_password' => 'Құпия сөз дұрыс емес.',
    'date_past' => ' :attribute өтіп кеткен.',
    'date' => ' :attribute жарамды күн емес.',
    'date_equals' => ':атрибуты :күнге тең күн болуы керек.',
    'date_format' => ' :attribute пішімі :format пішіміне сай емес.',
    'declined' => ':атрибут қабылданбауы керек.',
    'declined_if' => ':атрибуты :other :value болғанда қабылданбауы керек.',
    'different' => ' :attribute және :other әр түрлі болуы керек.',
    'digits' => ' :attribute мәні :digits сан болуы керек.',
    'digits_between' => ' :attribute мәні :min және :max аралығындағы сан болуы керек.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => ' :attribute жолында қосарланған мән бар.',
    'email' => ' :attribute жарамды электрондық пошта мекенжайы болуы керек.',
    'ends_with' => ':атрибуты келесілердің бірімен аяқталуы керек: :мәндер.',
    'enum' => 'Таңдалған :атрибут жарамсыз.',
    'exists' => ' Таңдалған :attribute жарамсыз.',
    'file' => 'The :attribute must be a file.',
    'filled' => ' :attribute жолы толтырылуы керек.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => ' :attribute кескін болуы керек.',
    'in' => ' таңдалған :attribute жарамсыз.',
    'in_array' => ' :attribute жолы :other ішінде жоқ.',
    'integer' => ' :attribute бүтін сан болуы керек.',
    'ip' => ' :attribute жарамды IP мекенжайы болуы керек.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => ' :attribute жарамды JSON тармағы болуы керек.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'mac_address' => ':атрибут жарамды MAC мекенжайы болуы керек.',
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ' :attribute мәні :max мәнінен көп болмауы керек.',
        'file' => ' :attribute мәні :max килобайттан көп болмауы керек.',
        'string' => ' :attribute тармағы :max таңбадан ұзын болмауы керек.',
        'array' => ' :attribute жиымының құрамы :max элементтен аспауы керек.',
    ],
    'mimes' => ' :attribute мынадай файл түрі болуы керек: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ' :attribute кемінде :min болуы керек.',
        'file' => ' :attribute көлемі кемінде :min килобайт болуы керек.',
        'string' => ' :attribute кемінде :min таңбадан тұруы керек.',
        'array' => ' :attribute кемінде :min элементтен тұруы керек.',
    ],
    'multiple_of' => ':атрибуты :мәннің еселігі болуы керек.',
    'not_in' => ' таңдалған :attribute жарамсыз.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => ' :attribute сан болуы керек.',
    'password' => 'Құпия сөз дұрыс емес.',
    'present' => ' :attribute болуы керек.',
    'prohibited' => ':attribute өрісіне тыйым салынған.',
    'prohibited_if' => ':attribute өрісіне :other :value болғанда тыйым салынады.',
    'prohibited_unless' => ':attribute өрісі :values ішінде :other болмаса, тыйым салынады.',
    'prohibits' => ':attribute өрісі :other қатысуына тыйым салады.',
    'regex' => ' :attribute пішімі жарамсыз.',
    'required' => ' :attribute толтырылуы керек.',
    'required_array_keys' => ':attribute өрісінде мыналар үшін жазбалар болуы керек: :values.',
    'required_if' => ' :attribute жолы :other мәні :value болған кезде толтырылуы керек.',
    'required_unless' => ' :attribute жолы :other мәні :values ішінде болмағанда толтырылуы керек.',
    'required_with' => ' :attribute жолы :values болғанда толтырылуы керек.',
    'required_with_all' => ' :attribute жолы :values болғанда толтырылуы керек.',
    'required_without' => ' :attribute жолы :values болмағанда толтырылуы керек.',
    'required_without_all' => ' :attribute жолы ешбір :values болмағанда толтырылуы керек.',
    'same' => ' :attribute және :other сәйкес болуы керек.',
    'size' => [
        'numeric' => ' :attribute көлемі :size болуы керек.',
        'file' => ' :attribute көлемі :size килобайт болуы керек.',
        'string' => ' :attribute тармағы :size таңбадан тұруы керек.',
        'array' => ' :attribute жиымы :size элементтен тұруы керек.',
    ],
    'starts_with' => ':атрибуты келесілердің бірінен басталуы керек: :мәндер.',
    'string' => ' :attribute тармақ болуы керек.',
    'timezone' => ' :attribute жарамды аймақ болуы керек.',
    'unique' => ' :attribute бос емес.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => ' :attribute пішімі жарамсыз.',
    'uuid' => ':атрибуты жарамды UUID болуы керек.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'email' => 'Электрондық пошта',
        'password' => 'Құпия сөз',
        'phone_number' => 'Телефон нөмірі',
        'first_name' => 'Аты',
        'last_name' => 'Тегі',
        'organization' => 'Ұйым',
        'client_type_id' => 'Клиент түрі',
    ],
];

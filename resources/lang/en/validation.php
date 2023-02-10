<?php

return [
    'accepted'             => ':Attribute ir jābūt pieņemtam.',
    'accepted_if'          => 'The :attribute must be accepted when :other is :value.',
    'active_url'           => ':Attribute ir ar nederīgu saiti.',
    'after'                => ':Attribute ir jābūt ar datumu pēc :date.',
    'after_or_equal'       => ':Attribute ir jābūt ar datumu pēc vai vienādu ar :date.',
    'alpha'                => ':Attribute var saturēt tikai burtus.',
    'alpha_dash'           => ':Attribute var saturēt tikai burtus, numurus un atstarpes.',
    'alpha_num'            => ':Attribute var tikai saturēt burtus un numurus.',
    'array'                => ':Attribute ir jābūt sakārtotam.',
    'before'               => ':Attribute ir jābūt ar datumu pirms :date.',
    'before_or_equal'      => ':Attribute ir jābūt ar datumu pirms vai vienādu ar :date.',
    'between'              => [
        'array'   => ':Attribute jābūt no :min līdz :max vienībām.',
        'file'    => ':Attribute jābūt starp :min un :max kilobaitiem.',
        'numeric' => ':Attribute jābūt starp :min un :max.',
        'string'  => ':Attribute jābūt no :min līdz :max zīmēm.',
    ],
    'boolean'              => ':Attribute lauciņam jābūt patiesam vai nepatiesam.',
    'confirmed'            => ':Attribute apstiprinājums neatbilst.',
    'current_password'     => 'The password is incorrect.',
    'date'                 => ':Attribute nav derīgs.',
    'date_equals'          => ':Attribute datumam jāsakrīt ar :date.',
    'date_format'          => ':Attribute neatbilst formātam :format.',
    'declined'             => 'The :attribute must be declined.',
    'declined_if'          => 'The :attribute must be declined when :other is :value.',
    'different'            => ':Attribute un :other ir jābūt atšķirīgiem.',
    'digits'               => 'Norādītajam tel. nr. ir jābūt :digits cipariem.',
    'digits_between'       => ':Attribute garumam ir jābūt starp :min un :max cipariem.',
    'dimensions'           => ':Attribute ir nederīgs attēla izmērs.',
    'distinct'             => ':Attribute laukam ir dublikāts.',
    'doesnt_end_with'      => 'The :attribute may not end with one of the following: :values.',
    'doesnt_start_with'    => 'The :attribute may not start with one of the following: :values.',
    'email'                => ':Attribute ir jābūt derīgai e-pasta adresei.',
    'ends_with'            => ':Attribute jābeidzas ar vienu no šiem: :values.',
    'enum'                 => 'The selected :attribute is invalid.',
    'exists'               => 'Izvēlētais :attribute ir nederīgs.',
    'file'                 => ':Attribute jābūt failam.',
    'filled'               => ':Attribute lauks ir obligāts.',
    'gt'                   => [
        'array'   => ':Attribute jābūt vairāk nekā :value vienībām.',
        'file'    => ':Attribute jābūt lielākam par :value kilobaitiem.',
        'numeric' => ':Attribute jābūt lielākam par :value.',
        'string'  => ':Attribute jāpārsniedz :value rakstzīmes.',
    ],
    'gte'                  => [
        'array'   => ':Attribute jābūt :value vai vairāk vienībām.',
        'file'    => ':Attribute jābūt lielākam vai vienādam ar :value kilobaitiem.',
        'numeric' => ':Attribute jābūt lielākam vai vienādam ar :value.',
        'string'  => ':Attribute garumam jābūt lielākam vai vienādam ar :value rakstzīmēm.',
    ],
    'image'                => ':Attribute jābūt attēlam.',
    'in'                   => 'Izvēlētais :attribute ir nederīgs.',
    'in_array'             => ':Other neeksistē lauks :attribute.',
    'integer'              => ':Attribute ir jābūt skaitlim.',
    'ip'                   => ':Attribute jābūt derīgai IP adresei.',
    'ipv4'                 => ':Attribute jābūt derīgai IPv4 adresei.',
    'ipv6'                 => ':Attribute jābūt derīgai IPv6 adresei.',
    'json'                 => ':Attribute jābūt derīgai JSON virknei.',
    'lt'                   => [
        'array'   => ':Attribute jābūt mazāk nekā :value vienībām.',
        'file'    => ':Attribute nedrīkst pārsniegt :value kilobaitus.',
        'numeric' => ':Attribute jābūt mazākam nekā :value.',
        'string'  => ':Attribute nedrīkst pārsniegt :value rakstzīmes.',
    ],
    'lte'                  => [
        'array'   => ':Attribute nedrīkst būt vairāk par :value vienībām.',
        'file'    => ':Attribute nedrīkst pārsniegt :value kilobaitus.',
        'numeric' => ':Attribute jābūt mazākam vai vienādam ar :value.',
        'string'  => ':Attribute nedrīkst pārsniegt :value rakstzīmes.',
    ],
    'mac_address'          => 'The :attribute must be a valid MAC address.',
    'max'                  => [
        'array'   => ':Attribute nedrīkst pārsniegt :max vienības.',
        'file'    => ':Attribute nedrīkst pārsniegt :max kilobaitus.',
        'numeric' => ':Attribute nedrīkst pārsniegt :max.',
        'string'  => ':Attribute nedrīkst pārsniegt :max rakstzīmes.',
    ],
    'max_digits'           => 'The :attribute must not have more than :max digits.',
    'mimes'                => ':Attribute jābūt faila tipam: :values',
    'mimetypes'            => ':Attribute jābūt faila tipam: :values.',
    'min'                  => [
        'array'   => ':Attribute jāsatur vismaz :min vienības.',
        'file'    => ':Attribute jābūt vismaz :min kilobaitiem.',
        'numeric' => ':Attribute jābūt vismaz :min.',
        'string'  => ':Attribute jābūt vismaz :min rakstzīmēm.',
    ],
    'min_digits'           => 'The :attribute must have at least :min digits.',
    'multiple_of'          => ':Attribute jābūt :value daudzkārtnim.',
    'not_in'               => 'izvēlētais :attribute ir nederīgs.',
    'not_regex'            => ':Attribute formāts ir nederīgs.',
    'numeric'              => ':Attribute jābūt skaitlim.',
    'password'             => [
        'letters'       => 'The :attribute must contain at least one letter.',
        'mixed'         => 'The :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers'       => 'The :attribute must contain at least one number.',
        'symbols'       => 'The :attribute must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present'              => ':Attribute lauks ir obligāts.',
    'prohibited'           => ':Attribute lauks ir aizliegts.',
    'prohibited_if'        => ':Attribute lauks ir aizliegts, ja :other ir :value.',
    'prohibited_unless'    => ':Attribute lauks ir aizliegts, ja vien :other nav :values.',
    'prohibits'            => 'The :attribute field prohibits :other from being present.',
    'regex'                => ':Attribute formāts ir nederīgs.',
    'required'             => ':Attribute lauks ir obligāts.',
    'required_array_keys'  => 'The :attribute field must contain entries for: :values.',
    'required_if'          => ':Attribute lauks ir obligāts, ja :other ir :values.',
    'required_unless'      => ':Attribute lauks ir obligāts, ja vien :other nav :values.',
    'required_with'        => ':Attribute lauks ir obligāts, kad kāds no :values ir pieejams.',
    'required_with_all'    => ':Attribute lauks ir obligāts, kad viss no :values ir pieejams.',
    'required_without'     => ':Attribute lauks ir obligāts, kad kāds no :values nav pieejams.',
    'required_without_all' => ':Attribute lauks ir obligāts, kad neviens no :values nav pieejams.',
    'same'                 => ':Attribute un :other ir jāsakrīt.',
    'size'                 => [
        'array'   => ':Attribute jāsatur :size vienības.',
        'file'    => ':Attribute jābūt :size kilobaiti.',
        'numeric' => ':Attribute jābūt :size.',
        'string'  => ':Attribute jābūt :size rakstzīmēm.',
    ],
    'starts_with'          => ':Attribute jāsākas ar kādu no šiem: :values',
    'string'               => ':Attribute jābūt virknē.',
    'timezone'             => ':Attribute jābūt derīgai laika zonai.',
    'unique'               => ':Attribute jau ir aizņemts.',
    'uploaded'             => ':Attribute netika augšupielādēts.',
    'url'                  => ':Attribute formāts ir nederīgs.',
    'uuid'                 => ':Attribute jābūt derīgam UUID.',
    'attributes'           => [
        'address'                  => 'address',
        'age'                      => 'age',
        'amount'                   => 'amount',
        'area'                     => 'area',
        'available'                => 'available',
        'birthday'                 => 'birthday',
        'body'                     => 'body',
        'city'                     => 'city',
        'content'                  => 'content',
        'country'                  => 'country',
        'created_at'               => 'created at',
        'creator'                  => 'creator',
        'current_password'         => 'current password',
        'date'                     => 'date',
        'date_of_birth'            => 'date of birth',
        'day'                      => 'day',
        'deleted_at'               => 'deleted at',
        'description'              => 'description',
        'district'                 => 'district',
        'duration'                 => 'duration',
        'email'                    => 'email',
        'excerpt'                  => 'excerpt',
        'filter'                   => 'filter',
        'first_name'               => 'first name',
        'gender'                   => 'gender',
        'group'                    => 'group',
        'hour'                     => 'hour',
        'image'                    => 'image',
        'last_name'                => 'last name',
        'lesson'                   => 'lesson',
        'line_address_1'           => 'line address 1',
        'line_address_2'           => 'line address 2',
        'message'                  => 'message',
        'middle_name'              => 'middle name',
        'minute'                   => 'minute',
        'mobile'                   => 'mobile',
        'month'                    => 'month',
        'name'                     => 'name',
        'national_code'            => 'national code',
        'number'                   => 'number',
        'password'                 => 'password',
        'password_confirmation'    => 'password confirmation',
        'phone'                    => 'phone',
        'photo'                    => 'photo',
        'postal_code'              => 'postal code',
        'price'                    => 'price',
        'province'                 => 'province',
        'recaptcha_response_field' => 'recaptcha response field',
        'remember'                 => 'remember',
        'restored_at'              => 'restored at',
        'result_text_under_image'  => 'result text under image',
        'role'                     => 'role',
        'second'                   => 'second',
        'sex'                      => 'sex',
        'short_text'               => 'short text',
        'size'                     => 'size',
        'state'                    => 'state',
        'street'                   => 'street',
        'student'                  => 'student',
        'subject'                  => 'subject',
        'teacher'                  => 'teacher',
        'terms'                    => 'terms',
        'test_description'         => 'test description',
        'test_locale'              => 'test locale',
        'test_name'                => 'test name',
        'text'                     => 'text',
        'time'                     => 'time',
        'title'                    => 'title',
        'updated_at'               => 'updated at',
        'username'                 => 'username',
        'year'                     => 'year',
        'question'                 => 'jautājums',
    ],
];

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

    'accepted' => 'Kolom :attribute harus diterima.',
    'accepted_if' => 'Kolom :attribute harus diterima ketika :other adalah :value.',
    'active_url' => 'Kolom :attribute harus merupakan URL yang valid.',
    'after' => 'Kolom :attribute harus merupakan tanggal setelah :date.',
    'after_or_equal' => 'Kolom :attribute harus merupakan tanggal setelah atau sama dengan :date.',
    'alpha' => 'Kolom :attribute harus hanya berisi huruf.',
    'alpha_dash' => 'Kolom :attribute harus hanya berisi huruf, angka, tanda hubung, dan garis bawah.',
    'alpha_num' => 'Kolom :attribute harus hanya berisi huruf dan angka.',
    'array' => 'Kolom :attribute harus merupakan sebuah array.',
    'ascii' => 'Kolom :attribute harus hanya berisi karakter alfanumerik satu byte dan simbol.',
    'before' => 'Kolom :attribute harus merupakan tanggal sebelum :date.',
    'before_or_equal' => 'Kolom :attribute harus merupakan tanggal sebelum atau sama dengan :date.',
    'between' => [
        'array' => 'Kolom :attribute harus memiliki antara :min dan :max item.',
        'file' => 'Kolom :attribute harus memiliki ukuran antara :min dan :max kilobita.',
        'numeric' => 'Kolom :attribute harus memiliki nilai antara :min dan :max.',
        'string' => 'Kolom :attribute harus memiliki panjang antara :min dan :max karakter.',
    ],
    'boolean' => 'Kolom :attribute harus bernilai true atau false.',
    'can' => 'Kolom :attribute berisi nilai yang tidak diizinkan.',
    'confirmed' => 'Konfirmasi kolom :attribute tidak cocok.',
    'current_password' => 'Kata sandi tidak benar.',
    'date' => 'Kolom :attribute harus merupakan tanggal yang valid.',
    'date_equals' => 'Kolom :attribute harus merupakan tanggal yang sama dengan :date.',
    'date_format' => 'Kolom :attribute harus sesuai dengan format :format.',
    'decimal' => 'Kolom :attribute harus memiliki :decimal tempat desimal.',
    'declined' => 'Kolom :attribute harus ditolak.',
    'declined_if' => 'Kolom :attribute harus ditolak ketika :other adalah :value.',
    'different' => 'Kolom :attribute dan :other harus berbeda.',
    'digits' => 'Kolom :attribute harus terdiri dari :digits digit.',
    'digits_between' => 'Kolom :attribute harus terdiri dari antara :min dan :max digit.',
    'dimensions' => 'Kolom :attribute memiliki dimensi gambar yang tidak valid.',
    'distinct' => 'Kolom :attribute memiliki nilai yang duplikat.',
    'doesnt_end_with' => 'Kolom :attribute tidak boleh diakhiri dengan salah satu dari berikut: :values.',
    'doesnt_start_with' => 'Kolom :attribute tidak boleh dimulai dengan salah satu dari berikut: :values.',
    'email' => 'Kolom :attribute harus merupakan alamat email yang valid.',
    'ends_with' => 'Kolom :attribute harus diakhiri dengan salah satu dari berikut: :values.',
    'enum' => 'Kolom :attribute yang dipilih tidak valid.',
    'exists' => 'Kolom :attribute yang dipilih tidak valid.',
    'file' => 'Kolom :attribute harus merupakan berkas.',
    'filled' => 'Kolom :attribute harus memiliki nilai.',
    'gt' => [
    'array' => 'Kolom :attribute harus memiliki lebih dari :value item.',
    'file' => 'Kolom :attribute harus lebih besar dari :value kilobita.',
    'numeric' => 'Kolom :attribute harus lebih besar dari :value.',
    'string' => 'Kolom :attribute harus lebih panjang dari :value karakter.',
    ],
    'gte' => [
    'array' => 'Kolom :attribute harus memiliki :value item atau lebih.',
    'file' => 'Kolom :attribute harus lebih besar dari atau sama dengan :value kilobita.',
    'numeric' => 'Kolom :attribute harus lebih besar dari atau sama dengan :value.',
    'string' => 'Kolom :attribute harus lebih panjang dari atau sama dengan :value karakter.',
    ],
    'image' => 'Kolom :attribute harus merupakan gambar.',
    'in' => 'Kolom :attribute yang dipilih tidak valid.',
    'in_array' => 'Kolom :attribute harus ada dalam :other.',
    'integer' => 'Kolom :attribute harus merupakan bilangan bulat.',
    'ip' => 'Kolom :attribute harus merupakan alamat IP yang valid.',
    'ipv4' => 'Kolom :attribute harus merupakan alamat IPv4 yang valid.',
    'ipv6' => 'Kolom :attribute harus merupakan alamat IPv6 yang valid.',
    'json' => 'Kolom :attribute harus merupakan string JSON yang valid.',
    'lowercase' => 'Kolom :attribute harus dalam huruf kecil.',
    'lt' => [
    'array' => 'Kolom :attribute harus memiliki kurang dari :value item.',
    'file' => 'Kolom :attribute harus kurang dari :value kilobita.',
    'numeric' => 'Kolom :attribute harus kurang dari :value.',
    'string' => 'Kolom :attribute harus kurang dari :value karakter.',
    ],
    'lte' => [
    'array' => 'Kolom :attribute tidak boleh memiliki lebih dari :value item.',
    'file' => 'Kolom :attribute harus kurang dari atau sama dengan :value kilobita.',
    'numeric' => 'Kolom :attribute harus kurang dari atau sama dengan :value.',
    'string' => 'Kolom :attribute harus kurang dari atau sama dengan :value karakter.',
    ],
    'mac_address' => 'Kolom :attribute harus merupakan alamat MAC yang valid.',
    'max' => [
    'array' => 'Kolom :attribute tidak boleh memiliki lebih dari :max item.',
    'file' => 'Kolom :attribute tidak boleh lebih besar dari :max kilobita.',
    'numeric' => 'Kolom :attribute tidak boleh lebih besar dari :max.',
    'string' => 'Kolom :attribute tidak boleh lebih besar dari :max karakter.',
    ],
    'max_digits' => 'Kolom :attribute tidak boleh memiliki lebih dari :max digit.',
    'mimes' => 'Kolom :attribute harus merupakan berkas dengan jenis: :values.',
    'mimetypes' => 'Kolom :attribute harus merupakan berkas dengan jenis: :values.',
    'min' => [
        'array' => 'Kolom :attribute harus memiliki setidaknya :min item.',
        'file' => 'Kolom :attribute harus memiliki setidaknya :min kilobita.',
        'numeric' => 'Kolom :attribute harus memiliki setidaknya :min.',
        'string' => 'Kolom :attribute harus memiliki setidaknya :min karakter.',
        ],
    'min_digits' => 'Kolom :attribute harus memiliki setidaknya :min digit.',
    'missing' => 'Kolom :attribute harus tidak ada.',
    'missing_if' => 'Kolom :attribute harus tidak ada ketika :other adalah :value.',
    'missing_unless' => 'Kolom :attribute harus tidak ada kecuali :other adalah :value.',
    'missing_with' => 'Kolom :attribute harus tidak ada ketika :values ada.',
    'missing_with_all' => 'Kolom :attribute harus tidak ada ketika :values ada semua.',
    'multiple_of' => 'Kolom :attribute harus merupakan kelipatan dari :value.',
    'not_in' => 'Kolom :attribute yang dipilih tidak valid.',
    'not_regex' => 'Format kolom :attribute tidak valid.',
    'numeric' => 'Kolom :attribute harus merupakan angka.',
    'password' => [
        'letters' => 'Kolom :attribute harus mengandung setidaknya satu huruf.',
        'mixed' => 'Kolom :attribute harus mengandung setidaknya satu huruf kapital dan satu huruf kecil.',
        'numbers' => 'Kolom :attribute harus mengandung setidaknya satu angka.',
        'symbols' => 'Kolom :attribute harus mengandung setidaknya satu simbol.',
        'uncompromised' => 'Kolom :attribute yang diberikan telah muncul dalam kebocoran data. Silakan pilih kolom :attribute yang berbeda.',
        ],
        'present' => 'Kolom :attribute harus hadir.',
    'prohibited' => 'Kolom :attribute dilarang.',
    'prohibited_if' => 'Kolom :attribute dilarang ketika :other adalah :value.',
    'prohibited_unless' => 'Kolom :attribute dilarang kecuali :other ada dalam :values.',
    'prohibits' => 'Kolom :attribute melarang :other untuk hadir.',
    'regex' => 'Format kolom :attribute tidak valid.',
    'required' => 'Kolom :attribute tidak boleh kosong.',
    'required_array_keys' => 'Kolom :attribute harus berisi entri untuk: :values.',
    'required_if' => 'Kolom :attribute diperlukan ketika :other adalah :value.',
    'required_if_accepted' => 'Kolom :attribute diperlukan ketika :other diterima.',
    'required_unless' => 'Kolom :attribute diperlukan kecuali :other ada dalam :values.',
    'required_with' => 'Kolom :attribute diperlukan ketika :values hadir.',
    'required_with_all' => 'Kolom :attribute diperlukan ketika :values hadir semua.',
    'required_without' => 'Kolom :attribute diperlukan ketika :values tidak hadir.',
    'required_without_all' => 'Kolom :attribute diperlukan ketika tidak ada dari :values yang hadir.',
    'same' => 'Kolom :attribute harus cocok dengan :other.',
    'size' => [
        'array' => 'Kolom :attribute harus berisi :size item.',
        'file' => 'Kolom :attribute harus memiliki ukuran :size kilobita.',
        'numeric' => 'Kolom :attribute harus memiliki nilai :size.',
        'string' => 'Kolom :attribute harus memiliki :size karakter.',
        ],
    'starts_with' => 'Kolom :attribute harus dimulai dengan salah satu dari berikut: :values.',
    'string' => 'Kolom :attribute harus merupakan string.',
    'timezone' => 'Kolom :attribute harus merupakan zona waktu yang valid.',
    'unique' => 'Kolom :attribute sudah digunakan.',
    'uploaded' => 'Gagal mengunggah kolom :attribute.',
    'uppercase' => 'Kolom :attribute harus dalam huruf kapital.',
    'url' => 'Kolom :attribute harus merupakan URL yang valid.',
    'ulid' => 'Kolom :attribute harus merupakan ULID yang valid.',
    'uuid' => 'Kolom :attribute harus merupakan UUID yang valid.',

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

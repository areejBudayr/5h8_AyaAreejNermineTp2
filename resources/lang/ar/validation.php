<?php
return [
    'required' => 'حقل :attribute مطلوب.',
    'numeric'  => 'يجب أن يكون :attribute رقمًا.',
    'integer'  => 'يجب أن يكون :attribute عددًا صحيحًا.',
    'min'      => [
        'numeric' => 'يجب أن يكون :attribute على الأقل :min.',
    ],
    'image'    => 'يجب أن يكون :attribute صورة.',
    'mimes'    => ':attribute يجب أن يكون من النوع: :values.',
    'exists'   => 'القيمة المحددة في :attribute غير صالحة.',

    'attributes' => [
        'nom'       => 'الاسم',
        'description'=> 'الوصف',
        'prix'      => 'السعر',
        'quantite'  => 'الكمية',
        'image'     => 'الصورة',
        'category_id'=> 'الفئة',
    ],
];

<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class Exist implements ValidationRule
{
    protected $string;

    public function __construct(
        string $string
    )
    {
        $this->string = $string;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        [$table, $column] = explode('.', $this->string);
        $query = DB::table($table)
            ->where($column, $value)
            ->where('is_delete', 0)
            ->exists();

        if(!$query){
            $fail('Không tồn tại :attribute trên hệ thống');
        }
    }
}

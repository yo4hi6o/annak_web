<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class AdminPasswordCheck implements Rule {
    private $db_val;
    private $input_val;

    /**
     * Create a new rule instance.
     *
     * @param $db_val
     * @param $input_val
     */
    public function __construct( $input_val, $db_val ) {
        $this->db_val    = $db_val;
        $this->input_val = $input_val;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     *
     * @return bool
     */
    public function passes( $attribute, $value ) {
        return Hash::check( $this->input_val, $this->db_val );
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return __( "validation.not_match_error_msg" );
    }
}

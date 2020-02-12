<?php 
namespace App\Traits;

Trait RankTrinca {

    public function isTrinca($array_numbers) {

        $count = 0;

        $count_master = 0;

        $result = count(array_unique($array_numbers));

        if ($result == 3) { //example (9,9,9,11,11) -> result = (9,11) 2 positions  || (9,9,11,11,11)           

            $pos = array( ($array_numbers[0]), ($array_numbers[1]), ($array_numbers[2]), ($array_numbers[3]), ($array_numbers[4]) );

            foreach ($pos as $key => $value_pos) {

                foreach ($array_numbers as $value) {

                    if ($value_pos == $value) {

                        $count ++;

                    } else {

                        if ($count > $count_master) {

                            $count_master = $count; 

                        }

                        $count = 0;                     
                    }

                }

            }

            if ($count_master == 3) { // is a trinca and others differents 2

                return true;

            } else {

                return false;

            }           

        } else {

            return false;

        }        

    }


}

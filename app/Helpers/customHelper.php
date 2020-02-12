<?php

    function sequenceNumber($param) {

        foreach ($param as $value) {

            if (!isset($last)) {

                $last = $value;

            } else {

                $last = $last+1;

                if ($last != $value--) {

                    return false;

                }

            }

        }

        return true;
    }

    function first_10_last_14($param) {

    	// in this point, I already know that is a sequence, just needs to know if starts in 10 and finish in 14
		$first = $param[0];

		$last = $param[4];

    	if ( ($first == 10) && ($last == 14) ) {

    		return true;

    	} else {

    		return false;

    	}

    }

    function sameNaipe($param){

        foreach ($param as $value) {

            if (!isset($last)) {

                $last = $value;

            } else {

                if ($last != $value) {

                    return false;

                }

            }

        }

        return true;

    }    

	function changeStringPerArray($type, $arrayPlayer) {

		$returnArrayNumber = array();
		$returnArrayNaipe = array();

	    foreach ($arrayPlayer as $value) {

	        $numbers = substr($value,0,1);
	        $naipes = substr($value,1,2);
	        array_push($returnArrayNumber, $numbers);
	        array_push($returnArrayNaipe, $naipes);

	    }

	    if ($type == "number") {

	    	return $returnArrayNumber;

	    } else {

	    	return $returnArrayNaipe;

	    }


	}    

    function changeStringPerNumber($param) {

        $return = array();

        foreach ($param as $value) {
                   
            switch ($value) {
                case "T":
                    array_push($return, 10);
                    break;
                case "J":
                    array_push($return, 11);
                    break;
                case "Q":
                    array_push($return, 12);
                    break;
                case "K":
                    array_push($return, 13);
                    break;                    
                case "A":
                    array_push($return, 14);
                    break;                
                default:
                    $value = intval($value);

                    array_push($return, $value);

            }

        }

        return $return;

    }
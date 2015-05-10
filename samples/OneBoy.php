<?php
/**
 * This is a sample of some music, it is the melody from "One Boy" from the Musical Oliver Twist
 */

use SNicholson\PHPSheetMusic\KeySignature;
use SNicholson\PHPSheetMusic\MF;
use SNicholson\PHPSheetMusic\Note;

require_once '../vendor/autoload.php';

//Set the Time signature for this piece, 4:4 is default, so no params here
$timeSignature = MF::timeSignature();

//The piece is in F
$keySignature = MF::keySignature(KeySignature::$f);

//Start the voice
$voice = MF::voice($timeSignature,$keySignature);

//Start defining the notes
$voice->bar(
    MF::rest(NOTE::MINIM,NOTE::DOTTED)
)->bar(

);

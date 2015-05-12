<?php
/**
 * This is a sample of some music, it is the melody from "One Boy" from the Musical Oliver Twist
 */

use SNicholson\PHPSheetMusic\FileHandlers\MusicXMLGenerator;
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
    MF::minimRest(Note::DOTTED),
    MF::crotchetRest()
)->bar(
    MF::minim(Note::D,NOTE::DOTTED),
    MF::quaver(Note::C),
    MF::quaver(Note::A)
)->bar(
    MF::minim(Note::D),
    MF::quaver(Note::D),
    MF::quaver(Note::C),
    MF::quaver(Note::E),
    MF::quaver(Note::A)
)->bar(
    MF::minim(Note::D,Note::DOTTED),
    MF::semiQuaver(Note::C),
    MF::semiQuaver(Note::B, Note::NATURAL),
    MF::semiQuaver(Note::A),
    MF::semiQuaver(Note::G)
)->bar(
    MF::crotchet(Note::A),
    MF::minim(Note::D),
    MF::semiQuaver(Note::D),
    MF::semiQuaver(Note::F),
    MF::semiQuaver(Note::E),
    MF::semiQuaver(Note::A)
)->bar(
    MF::crotchet(Note::A),
    MF::minim(Note::D),
    MF::semiQuaver(Note::D),
    MF::semiQuaver(Note::F),
    MF::semiQuaver(Note::E),
    MF::semiQuaver(Note::A)
);

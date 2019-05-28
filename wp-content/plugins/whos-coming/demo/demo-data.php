<?php

$names = 'Stefany Audet
Hee Huitt
Eartha Pecora
Gertha Espy
Venice Schulz
Racheal Hallenbeck
Perry Crafford
Glennis Manzanares
Sherrell Fraire
Lisette Augsburger
Damien Mcclendon
Oliva Krishnan
Phil Midgette
Caroline Turman
Kayce Balogh
Shandi Gagliardi
Beth Dykstra
Waylon Stanbery
Alma Infante
Cecila Mcnamee
Tawnya Rustad
Golda Herrada
Maxine Ariza
Dulcie Bashaw
Rachele List
Azalee Burns
Ivy Durrell
Lina Flatley
Lynne Buzzell
Sarah Schweizer
Jacque Ficklin
Kaitlin Franqui
Cary Wee
Cristine Mauk
Luanna Mount
Billy Engberg
Deidre Rounds
Maisha Oshea
Lakendra Eshbaugh
Ofelia Robie
Anton Philippi
Gala Uhrich
Napoleon Mcfarlane
Catherina Whelan
Danielle Wolter
Rhiannon Harley
Myrle Hepworth
Heath Simeon
Li Edberg
Mauricio Mauck
Angel Lipka
Ji Mckeel
Claudia Trosclair
Nia Parkhurst
Versie Hamler
Laurene Dubray
Lien Ferreri
Pauletta Waggoner
Everett Tooker
Cheyenne Utter
Bula Rheaume
Christi Dunfee
Marylin Thompkins
Christia Koster
Lina Pilgrim
Sherlene Gaus
Hanna Mcgahee
Petrina Schweinsberg
Keira Ridlon
Monica Kirkbride
Tawnya Willingham
Dara Petrey
Elvis Charters
Reiko Nusbaum
Aliza Muise
Wendy Hollingworth
Dorathy Hogge
Narcisa Weitzman
Marivel Srour
Reginia Blaschke
See Bartmess
Lupita Dino
Leonarda Rayes
Nery Norman
Sheena Schimmel
Marget Salido
Claire Troester
Phillip Spitzer
Coral Whistler
Lawanda Fritsch
Cordia Ledoux
Bronwyn Rimmer
Linda Alejandro
Nicki Andresen
Charleen Marciano
Danette Jin
Becki Brazeau
Hosea Sparks
Karey Carasco
Sau Hagaman';

$years = [
    '2017',
    '2013',
    '2008',
    '2003',
    '1998',
    '1993',
    '1988',
    '1983',
    '1978',
    '1973',
    '1968',
    '1963',
    '1958',
    '1953'
];

return 'name,class_year
' . trim(
        array_reduce(
            preg_split( "/[\r\n]+/", $names ),
            function( $output, $line ) use ( $years ) {
                $output .= trim( $line ) . ',';
                $output .= $years[array_rand( $years )] . "\r";
                
                return $output;
            },
            ''
        )
    );

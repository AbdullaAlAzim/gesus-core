<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = '_gesusdownload';

    //
    // Create taxonomy options
    CSF::createTaxonomyOptions( $prefix, array(
        'taxonomy'  => 'download_category',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ) );

    //
    // Create a section
    CSF::createSection( $prefix, array(
        'fields' => array(

            array(
                'id'    => 'tax_photo',
                'type'  => 'media',
                'title' => 'Media',
            ),


        )
    ) );

}
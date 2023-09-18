<?php

namespace App;

class Customizer
{
    public function __construct()
    {
        add_action('customize_register', [$this, 'customizer_settings']);
    }

    public function customizer_settings($wp_customize)
    {

        $wp_customize->add_section( 'ddp_footer' , array(
            'title'      => esc_html__('Footer Links', 'sage'),
            'priority'   => 20,
        ) );
      
        $wp_customize->add_setting( 'ddp_facebook_link' , array(
            'default'     => '',
            'transport'   => 'refresh',
            array(
                'sanitize_callback' => 'esc_url_raw'
            )
        ) );
      
        $wp_customize->add_control( 'ddp_facebook_link', array(
            'label'      => 'Facebook',
            'section'    => 'ddp_footer',
            'type'       => 'url',
        ) );

        $wp_customize->add_setting( 'ddp_insta_link' , array(
            'default'     => '',
            'transport'   => 'refresh',
            array(
                'sanitize_callback' => 'esc_url_raw'
            )
        ) );
      
        $wp_customize->add_control( 'ddp_insta_link', array(
            'label'      => 'Instagram',
            'section'    => 'ddp_footer',
            'type'       => 'url',
        ) );

        $wp_customize->add_setting( 'ddp_linkedin_link' , array(
            'default'     => '',
            'transport'   => 'refresh',
            array(
                'sanitize_callback' => 'esc_url_raw'
            )
        ) );
      
        $wp_customize->add_control( 'ddp_linkedin_link', array(
            'label'      => 'LinkedIn',
            'section'    => 'ddp_footer',
            'type'       => 'url',
        ) );

        $wp_customize->add_setting( 'ddp_phone_link' , array(
            'default'     => '',
            'transport'   => 'refresh',
            array(
                'sanitize_callback' => 'esc_url_raw'
            )
        ) );
      
        $wp_customize->add_control( 'ddp_phone_link', array(
            'label'      => 'Phone',
            'section'    => 'ddp_footer',
            'type'       => 'url',
        ) );

    }
}

new Customizer();
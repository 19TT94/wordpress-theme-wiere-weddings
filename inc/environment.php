<?php

/**
 * Demo content and default images by environment.
 *
 * Shapes match the wiere-weddings Vue app (HomeView, AboutView, ServiceView):
 * - meta_type_key: text | callout | block-left | block-right
 * - callout + text use meta_paragraph_key as rendered content
 * - block-* use meta_list_key (JSON) for bullet lists; services also use excerpt
 * - featured images power _embed and featured_media_link in the REST API
 *
 * Bump seed_version when this file changes to refresh local demo content.
 */
return array(
  'development' => array(
    'seed_on_activation' => true,
    'seed_version'       => 2,
    'customizer' => array(
      'site_title' => 'Wiere Weddings',
      'name'       => 'Tiffany Wiere',
      'phone'      => '(805) 235-3825',
      'email'      => 'wiereweddings@gmail.com',
      'instagram'  => 'https://www.instagram.com/wiereweddings/',
      'facebook'   => '',
      'linkedin'   => '',
    ),
    'post_types' => array(
      'slide' => array(
        array( 'title' => 'Slide 1', 'image' => 'slide1.jpg' ),
        array( 'title' => 'Slide 2', 'image' => 'slide2.jpg' ),
        array( 'title' => 'Slide 3', 'image' => 'slide3.jpg' ),
        array( 'title' => 'Slide 4', 'image' => 'slide4.jpg' ),
        array( 'title' => 'Slide 5', 'image' => 'slide5.jpg' ),
      ),
      'home_content' => array(
        array(
          'title' => 'Wiere Weddings',
          'image' => 'engagement.jpg',
          'meta'  => array(
            'meta_type_key'        => 'text',
            'meta_paragraph_key'   => 'My mission is to make your dream wedding a reality. I look forward to helping you create your perfect day on the Central Coast!',
            'meta_image_width_key' => '30',
          ),
        ),
        array(
          'title' => 'Callout',
          'image' => 'callout-bg.jpeg',
          'meta'  => array(
            'meta_type_key'      => 'callout',
            'meta_paragraph_key' => 'Every love story is unique — your wedding should be too.',
          ),
        ),
        array(
          'title' => 'Planning &amp; Coordination',
          'image' => 'home-service-1.jpg',
          'meta'  => array(
            'meta_type_key'        => 'block-left',
            'meta_paragraph_key'   => '',
            'meta_image_width_key' => '40',
            'meta_bullet_type_key' => 'disc',
            'meta_list_key'        => '{"hc_field_list_item_1":"Full-service wedding planning from concept to celebration","hc_field_list_item_2":"Vendor sourcing, contract review, and management","hc_field_list_item_3":"Timeline creation and budget guidance","hc_field_list_item_4":"Design direction tailored to your vision"}',
          ),
        ),
        array(
          'title' => 'Your Vision, Our Priority',
          'image' => 'home-service-2.jpg',
          'meta'  => array(
            'meta_type_key'        => 'block-right',
            'meta_paragraph_key'   => '',
            'meta_image_width_key' => '40',
            'meta_bullet_type_key' => 'disc',
            'meta_list_key'        => '{"hc_field_list_item_1":"Partial planning support in the months before your wedding","hc_field_list_item_2":"Day-of coordination for a seamless celebration","hc_field_list_item_3":"Personalized attention to every detail","hc_field_list_item_4":"Calm, organized execution on your wedding day"}',
          ),
        ),
        array(
          'title' => 'Kind Words',
          'image' => 'clients.jpeg',
          'meta'  => array(
            'meta_type_key'        => 'text',
            'meta_paragraph_key'   => 'Couples across the Central Coast trust Wiere Weddings to bring warmth, organization, and joy to one of the most important days of their lives.',
            'meta_image_width_key' => '30',
          ),
        ),
      ),
      'about' => array(
        array(
          'title' => 'Hello!',
          'meta'  => array(
            'meta_type_key'      => 'text',
            'meta_paragraph_key' => 'I\'m Tiffany Wiere, owner and lead planner at Wiere Weddings. I help couples across the Central Coast design and execute weddings that feel authentically theirs — without the stress.',
          ),
        ),
        array(
          'title' => 'Meet Tiffany Wiere',
          'image' => 'about.jpeg',
          'meta'  => array(
            'meta_type_key'        => 'block-left',
            'meta_paragraph_key'   => '',
            'meta_image_width_key' => '40',
            'meta_bullet_type_key' => 'disc',
            'meta_list_key'        => '{"hc_field_list_item_1":"Central Coast wedding specialist based in Pismo Beach","hc_field_list_item_2":"Personalized planning with clear communication every step of the way","hc_field_list_item_3":"Trusted relationships with local venues and vendors","hc_field_list_item_4":"Dedicated to making your wedding day effortless and unforgettable"}',
          ),
        ),
      ),
      'services' => array(
        array(
          'title'   => 'Full Service Wedding Planning',
          'image'   => 'service-1.jpeg',
          'excerpt' => 'Comprehensive planning from engagement through your wedding day.',
          'meta'    => array(
            'meta_type_key'        => 'block-left',
            'meta_paragraph_key'   => '',
            'meta_image_width_key' => '40',
            'meta_bullet_type_key' => 'disc',
            'meta_list_key'        => '{"hc_field_list_item_1":"Unlimited communication and planning meetings","hc_field_list_item_2":"Vendor recommendations, booking, and contract review","hc_field_list_item_3":"Budget creation and management","hc_field_list_item_4":"Timeline development and rehearsal coordination","hc_field_list_item_5":"Full day-of coordination included"}',
          ),
        ),
        array(
          'title'   => 'Partial Planning',
          'image'   => 'service-2.jpeg',
          'excerpt' => 'Expert guidance during the final months before your wedding.',
          'meta'    => array(
            'meta_type_key'        => 'block-right',
            'meta_paragraph_key'   => '',
            'meta_image_width_key' => '40',
            'meta_bullet_type_key' => 'disc',
            'meta_list_key'        => '{"hc_field_list_item_1":"Begins approximately 2–3 months before your wedding","hc_field_list_item_2":"Vendor confirmations and final details","hc_field_list_item_3":"Timeline refinement and walk-through","hc_field_list_item_4":"Rehearsal attendance and day-of coordination"}',
          ),
        ),
        array(
          'title'   => 'Day-Of Coordination',
          'image'   => 'service-3.jpeg',
          'excerpt' => 'Professional oversight so you can stay present and enjoy every moment.',
          'meta'    => array(
            'meta_type_key'        => 'block-left',
            'meta_paragraph_key'   => '',
            'meta_image_width_key' => '40',
            'meta_bullet_type_key' => 'disc',
            'meta_list_key'        => '{"hc_field_list_item_1":"Up to 8 hours of wedding day coverage","hc_field_list_item_2":"Vendor and timeline management","hc_field_list_item_3":"Setup oversight and guest experience support","hc_field_list_item_4":"Emergency problem-solving behind the scenes"}',
          ),
        ),
        array(
          'title'   => 'Wedding Consultation',
          'image'   => 'service-4.jpeg',
          'excerpt' => 'One-on-one guidance to jump-start your planning journey.',
          'meta'    => array(
            'meta_type_key'        => 'block-right',
            'meta_paragraph_key'   => '',
            'meta_image_width_key' => '40',
            'meta_bullet_type_key' => 'disc',
            'meta_list_key'        => '{"hc_field_list_item_1":"90-minute planning session","hc_field_list_item_2":"Personalized recommendations for your vision and budget","hc_field_list_item_3":"Vendor and venue direction","hc_field_list_item_4":"Ideal for DIY couples who want expert guidance"}',
          ),
        ),
      ),
    ),
  ),
  'production' => array(
    'seed_on_activation' => false,
  ),
);

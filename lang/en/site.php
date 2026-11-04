<?php

/*
|--------------------------------------------------------------------------
| Teratak Moro Seneng — English copy
|--------------------------------------------------------------------------
| Every visible string on the landing page lives here. The Malay version is
| lang/ms/site.php and MUST keep exactly the same keys — if you add a key in
| one file, add it to the other too, otherwise the raw key shows on screen.
|
| Keys ending in _html are printed unescaped ({!! !!}) because they contain
| markup such as <br> or <em>. Keep the tags when translating.
*/

return [

    /* ---------------------------------------------------------------- */
    /* Head / SEO                                                        */
    /* ---------------------------------------------------------------- */
    'meta' => [
        'title'       => 'Teratak Moro Seneng | Traditional Homestay & Event Venue in Sabak Bernam',
        'description' => 'Experience traditional Malay living at Teratak Moro Seneng, Batu 38 Sabak Bernam. A spacious homestay and a beautiful event venue for weddings, engagements and family gatherings.',
        'keywords'    => 'homestay Sabak Bernam, homestay Selangor, kampung house rental, event venue Sabak Bernam, wedding venue, akad nikah venue Selangor, engagement ceremony, family gathering',
        'og_locale'   => 'en_MY',
        'og_title'    => 'Teratak Moro Seneng | Traditional Homestay & Event Venue in Sabak Bernam',
        'og_desc'     => 'Sleep in a spacious traditional Malay house, surrounded by tranquil village greenery — or make lasting memories at your engagement, akad nikah, persanding ceremony or family gathering here.',
        'og_image_alt' => 'Exterior view of Teratak Moro Seneng, a traditional wooden house at dusk',
        'tw_title'    => 'Teratak Moro Seneng | Traditional Homestay & Event Venue',
        'tw_desc'     => 'Traditional Malay living in Batu 38, Sabak Bernam. A homestay for families, an event venue for weddings and ceremonies.',
        'schema_desc' => 'Traditional Malay homestay and event venue in Batu 38, Sabak Bernam, Selangor.',
    ],

    /* ---------------------------------------------------------------- */
    /* Chrome: preloader, skip link, navigation                          */
    /* ---------------------------------------------------------------- */
    'a11y' => [
        'loading'       => 'Loading Teratak Moro Seneng',
        'skip'          => 'Skip to main content',
        'brand_home'    => 'Teratak Moro Seneng, back to top',
        'open_menu'     => 'Open menu',
        'close_menu'    => 'Close menu',
        'main_menu'     => 'Main menu',
        'lang_switch'   => 'Choose language',
        'back_to_top'   => 'Back to top',
        'chat_with_us'  => 'Chat with us',
        'rating'        => 'Rating 5 out of 5',
        'map_title'     => 'Map showing the location of Teratak Moro Seneng in Sabak Bernam, Selangor',
        'booking_type'  => 'Choose booking type',
        'scroll_about'  => 'Scroll to the About section',
        'image_viewer'  => 'Image viewer',
        'close_viewer'  => 'Close image viewer',
        'prev_image'    => 'Previous image',
        'next_image'    => 'Next image',
        'close_booking' => 'Close booking form',
        'prev_month'    => 'Previous month',
        'next_month'    => 'Next month',
    ],

    'nav' => [
        'brand_sub' => 'Sabak Bernam · Selangor',
        'about'     => 'About',
        'homestay'  => 'Homestay',
        'gallery'   => 'Gallery',
        'events'    => 'Events',
        'location'  => 'Location',
        'contact'   => 'Contact Us',
    ],

    /* ---------------------------------------------------------------- */
    /* Hero                                                              */
    /* ---------------------------------------------------------------- */
    'hero' => [
        'eyebrow'    => 'Batu 38 · Sabak Bernam · Selangor',
        'title_html' => 'A Grand Traditional House, A Living Heritage<br>',
        'lead'       => "Set in Batu 38, Sabak Bernam, Teratak Moro Seneng is a traditional Malay wooden house where heritage, hospitality and togetherness come together. Stay with family, gather with loved ones, or celebrate life's special moments in a setting unlike any other.",
        'img_alt'    => 'Traditional Malay house with a tall roof surrounded by coconut trees at dusk',
        'event_hall' => 'Event Space',
        'homestay'   => 'Homestay',
        'fact_rooms' => 'Bedrooms',
        'fact_guests' => 'Overnight Guests',
        'fact_acre'  => '1 acre',
        'fact_land'  => 'Open Grounds',
        'scroll_cue' => 'Come on in',
    ],

    /* ---------------------------------------------------------------- */
    /* About                                                             */
    /* ---------------------------------------------------------------- */
    'about' => [
        'eyebrow'    => 'Welcome Home',
        'title_html' => 'One House,<br><em>A Thousand Stories.</em>',
        'body'       => 'Built in the 1960s and carried through generations, Moro Seneng is more than a place to stay. Its timber structure, traditional craftsmanship and distinctive Malay-Javanese character tell the story of a family home built with care and meant to endure. Today, its doors are open for families, gatherings and celebrations to create stories of their own.',
        'tick_1'     => 'Traditional craftsmanship and architecture',
        'tick_2'     => 'A Spacious setting for stays and gatherings',
        'link'       => 'Explore More',
        'img_alt'    => 'Sunlight falling across the wooden floorboards of the main living room',
    ],

    /* ---------------------------------------------------------------- */
    /* Services — the two ways to use the teratak                        */
    /* ---------------------------------------------------------------- */
    'services' => [
        'eyebrow' => 'The Experience We Offer',
        'title'   => 'One Place, Many Ways to Gather',

        'stay' => [
            'tag'     => 'Whole house',
            'title'   => 'Traditional Homestay',
            'body'    => 'Enjoy the tranquility of a spacious, comfortable traditional wooden house. The whole house to yourselves, perfect for families and more meaningful getaways.',
            'f1'      => 'Exclusive traditional wooden house',
            'f2'      => '6 comfortable bedrooms',
            'f3'      => 'Full kitchen',
            'f4'      => 'Ample parking',
            'cta'     => 'Book the Homestay',
            'img_alt' => 'Exterior of the homestay with wooden steps and a shaded veranda',
        ],

        'event' => [
            'tag'     => 'Up to 300 guests',
            'title'   => 'A Special Event',
            'body'    => "Celebrate your special day in a setting that's grand, nostalgic, and unmistakably kampung. Room enough for your event, your family, and your beloved guests.",
            'f1'      => 'Engagement / Akad Nikah Ceremony',
            'f2'      => 'Family Day',
            'f3'      => 'Corporate Events',
            'f4'      => 'Open House',
            'cta'     => 'Book the Space',
            'img_alt' => 'Outdoor event setup with draped fabric, flowers and rows of chairs',
        ],
    ],

    /* ---------------------------------------------------------------- */
    /* Why choose us                                                     */
    /* ---------------------------------------------------------------- */
    'why' => [
        'eyebrow' => 'Our Uniqueness',
        'title'   => 'More Than a Homestay. A Living Heritage.',
        'h1'      => 'Grand, Antique Traditional Architecture House',
        'p1'      => 'a genuine taste of the past, with modern comfort.',
        'h2'      => '6 Spacious & Comfortable Bedrooms',
        'p2'      => 'one of the largest traditional homestays around.',
        'h3'      => 'Spacious, Flexible Event Grounds',
        'p3'      => 'Specially designed with an under-house area and a spacious front yard for all events.',
        'h4'      => 'Surrounded by Natural Calm',
        'p4'      => 'fresh air, greenery, true village stillness.',
    ],

    /* ---------------------------------------------------------------- */
    /* Accommodation stats band                                          */
    /* ---------------------------------------------------------------- */
    'acc' => [
        'eyebrow'    => 'Homestay Moro Seneng',
        'title_html' => 'Everything is ready,<br>waiting for your arrival',
        'note'       => 'Enjoy a stay in a spacious, comfortable traditional wooden house surrounded by a peaceful natural setting. Perfect for families, weddings, engagements, reunions and all kinds of special occasions.',
        'rooms'      => 'Bedrooms',
        'guests'     => 'Overnight Guests',
        'capacity'   => 'Event Capacity',
        'parking'    => 'Parking Bays',
    ],

    /* ---------------------------------------------------------------- */
    /* Marquee gallery                                                   */
    /* ---------------------------------------------------------------- */
    'marquee' => [
        'eyebrow' => 'Guest Gallery',
        'title'   => 'A Day at the Teratak',

        'cap_1' => 'BBQ Time',
        'cap_2' => 'The traditional charm of the living room',
        'cap_3' => 'The staircase, a favourite photo spot',
        'cap_4' => 'Open grounds for gathering and events',
        'cap_5' => 'A cozy corner for conversations',
        'cap_6' => 'Engagement Ceremony',
        'cap_7' => 'Family Activity Area',
        'cap_8' => 'Night View',

        'alt_1' => 'Traditional house at dusk',
        'alt_2' => 'Shaded wooden veranda',
        'alt_3' => 'Living room with wooden flooring',
        'alt_4' => 'Wide open grassy grounds',
        'alt_5' => 'Event decor with flowers',
        'alt_6' => 'Tall trees surrounding the house grounds',
        'alt_7' => 'Bedroom with a wooden bed',
        'alt_8' => 'Warm lamplight at night',
    ],

    /* ---------------------------------------------------------------- */
    /* Event banner                                                      */
    /* ---------------------------------------------------------------- */
    'event' => [
        'eyebrow'    => 'Events & Programmes',
        'title_html' => 'Your special day,<br><em>set against this teratak</em>',
        'lead'       => 'With open grounds directly in front of the house, Moro Seneng offers a flexible setting for ceremonies, gatherings and celebrations. From a simple family occasion to a larger event, the space can be arranged to suit your needs.',
        'pill_1'     => 'Akad Nikah · Persanding · Engagement',
        'pill_2'     => 'Hari Raya Open House',
        'pill_3'     => 'Family Day · Corporate · Seminar',
        'cta'        => 'Book the dates',
    ],

    /* ---------------------------------------------------------------- */
    /* Testimonials                                                      */
    /* ---------------------------------------------------------------- */
    'testi' => [
        'eyebrow' => 'What Guests Say',
        'title'   => "Stories From Those Who've Stayed.",

        'q1'    => 'A beautiful traditional house. Our whole family loved staying here — the kids played outside all weekend, and not one of them touched their phone.',
        'n1'    => 'Puan Nurhaliza Abdullah',
        'r1'    => 'Family stay · Shah Alam',

        'q2'    => 'The perfect place for our engagement ceremony. The grounds easily fit all our guests, and the photos in front of the house turned out beautifully.',
        'n2'    => 'Encik Ahmad Faizal',
        'r2'    => 'Engagement Ceremony · Klang',

        'q3'    => 'Peaceful, spacious and full of memories. We brought thirty people for a family day, and the host helped take care of everything — right down to the parking arrangements.',
        'n3'    => 'Cik Siti Rohani',
        'r3'    => 'Family gathering · Sungai Besar',
    ],

    /* ---------------------------------------------------------------- */
    /* Location & nearby attractions                                     */
    /* ---------------------------------------------------------------- */
    'loc' => [
        'eyebrow' => 'Our Location',
        'title'   => 'From the Teratak, Explore the Area',
        'nearby'  => 'Nearby Attractions',

        'n1_title' => 'Pantai Bagan Nakhoda Omar',
        'n1_body'  => 'Known as the "Bearded Tree Beach" — striking, unique mangrove roots lining the shoreline.',

        'n2_title' => 'Muzium Sabak Bernam',
        'n2_body'  => "The local community's farming and fishing history, located on Jalan Pasar.",

        'n3_title' => 'Waterfront Sabak Bernam',
        'n3_body'  => "A riverside recreational park with a children's playground — perfect for families.",

        'n4_title' => 'Kuala Selangor Fireflies',
        'n4_body'  => 'A night-time boat tour to see thousands of fireflies along the Selangor River.',
    ],

    /* ---------------------------------------------------------------- */
    /* Closing call to action                                            */
    /* ---------------------------------------------------------------- */
    'cta' => [
        'eyebrow'    => 'Come Visit',
        'title_html' => 'Ready to Experience<br>Traditional Malay Hospitality?',
        'pantun'     => "Don't wait for your next celebration to experience it. A grand space, real heritage, and a warmth you won't find anywhere else — only at the Teratak.",
        'button'     => 'Book Now',
    ],

    /* ---------------------------------------------------------------- */
    /* Footer                                                            */
    /* ---------------------------------------------------------------- */
    'footer' => [
        'brand_sub' => 'Homestay & Event Hall',
        'blurb'     => 'A traditional Malay house in Batu 38, Sabak Bernam — open to families, couples getting married and companies looking for a calmer setting.',
        'contact'   => 'Contact',
        'phone'     => 'Contact · +60 13-395 0231',
        'rights'    => 'Teratak Moro Seneng. All rights reserved.',
        'address'   => 'Batu 38, Sabak Bernam, Selangor, Malaysia',
        'wa_label'  => 'Contact us',
    ],

    /* ---------------------------------------------------------------- */
    /* Booking modal                                                     */
    /* ---------------------------------------------------------------- */
    'booking' => [
        'title'        => 'Request a Booking',
        'note'         => "Pick your dates below. Red dates are already taken. We'll confirm your request by WhatsApp — dates are only held once we confirm.",
        'name'         => 'Name',
        'name_ph'      => 'Your full name',
        'type'         => 'Booking type',
        'event_hall'   => 'Event Space',
        'homestay'     => 'Homestay',
        'package'      => 'Space + Homestay Package',
        'choose_dates' => 'Choose your dates',
        'legend_open'  => 'Available',
        'legend_booked' => 'Booked',
        'legend_pick'  => 'Your pick',
        'legend_low'   => 'Lowest price',
        'legend_special' => 'Special / holiday price',
        'estimate'     => 'Estimated price',
        'estimate_note' => 'Homestay and the Package are priced per night (check-out day is free), Event Hall per day. Final price is confirmed on WhatsApp.',
        'from'         => 'From date',
        'to'           => 'To date',
        'date_ph'      => 'Pick on calendar',
        'submit'       => 'Send Booking Request',

        'done_title'   => 'Request sent',
        'done_text_html' => "Thank you, <strong id=\"bkDoneName\">&mdash;</strong>. We've received your request for <strong id=\"bkDoneDates\">&mdash;</strong>.",
        'done_pending_html' => "Status: <strong>pending</strong> — these dates are <em>not</em> held yet. We'll WhatsApp you to confirm, and only then are they booked.",
        'done_wa'      => 'Message us on WhatsApp',
        'done_close'   => 'Done',

        /* Strings the inline JavaScript writes into the calendar */
        'js' => [
            'loading'      => 'Loading availability…',
            'red_booked'   => 'Red dates are already booked.',
            'all_open'     => 'All dates are currently open.',
            'load_failed'  => 'Could not load availability — we will confirm your dates by WhatsApp.',
            'crosses'      => 'That range crosses a booked date — please pick again.',
            'pick_end'     => 'Now pick your check-out / end date.',
            'selected'     => 'Selected',
            'pick_first'   => 'Please pick your dates on the calendar first.',
            'dow'          => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            'date_locale'  => 'en-GB',
            'currency'     => 'RM',
            'day'          => 'day',
            'days'         => 'days',
            'night'        => 'night',
            'nights'       => 'nights',
        ],

        /* Pre-filled WhatsApp messages. :name / :type / :date are replaced. */
        'wa_intro'   => 'Assalamualaikum Teratak Moro Seneng, I would like to ask about booking.',
        'wa_request' => "Assalamualaikum Teratak Moro Seneng, I would like to REQUEST a booking (pending your confirmation).\nName: :name\nType: :type\nDate: :date",
        /* Appended to the message when a price is known. :total is replaced. */
        'wa_estimate' => "\nEstimated price: :total",
    ],

];

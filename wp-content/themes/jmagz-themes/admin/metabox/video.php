<?php

return array(
    'id'          => 'jmagz_blog_video',
    'types'       => array('post','review'),
    'title'       => 'Video',
    'priority'    => 'high',
    'template'    => array(

        array(
            'type' => 'select',
            'name' => 'video_type',
            'label' => 'Video Type',
            'items' => array(
                array(
                    'value' => 'youtube',
                    'label' => 'Youtube',
                ),
                array(
                    'value' => 'vimeo',
                    'label' => 'Vimeo',
                ),
                array(
                    'value' => 'html5video',
                    'label' => 'HTML 5 Video',
                ),
            ),
            'default' => array(
                'youtube',
            ),
        ),


        array(
            'type' => 'textbox',
            'name' => 'video_url',
            'label' => 'Video URL',
            'description' => 'example : http://www.youtube.com/watch?v=p65X71BTCfk',
            'dependency' => array(
                'field'    => 'video_type',
                'function' => 'jeg_video_youtube_vimeo',
            ),
        ),

        array(
            'type'      => 'group',
            'repeating' => false,
            'length'    => 1,
            'name'      => 'video',
            'title'     => 'HTML 5 Video',
            'dependency' => array(
                'field'    => 'video_type',
                'function' => 'jeg_video_html5',
            ),
            'fields'    => array(
                array(
                    'type' => 'imageupload',
                    'name' => 'bgfallback',
                    'label' => 'Background Fallback Image',
                ),
                array(
                    'type' => 'upload',
                    'name' => 'videomp4',
                    'label' => 'MP4 format Video',
                ),
                array(
                    'type' => 'upload',
                    'name' => 'videowebm',
                    'label' => 'WEBM format Video',
                ),
                array(
                    'type' => 'upload',
                    'name' => 'videoogg',
                    'label' => 'OGG format Video',
                ),
            ),
        ),
    ),
);
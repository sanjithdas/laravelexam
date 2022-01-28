<?php

return [
    'userManagement' => [
        'title'          => 'Manage Users',
        'title_singular' => 'User management',
    ],
    'permission'     => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'           => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'category'       => [
        'main_title'    => 'Manage Category',
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'title_select'  => 'Select Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],

    'batch'       => [
        'main_title'    => 'Manage Batch',
        'title'          => 'Batches',
        'title_singular' => 'Batch',
        'title_select'  => 'Select Batch',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],


    'question'       => [
        'main_title'    => 'Manage Questions',
        'title'          => 'Questions',
        'title_singular' => 'Question',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => '',
            'category'             => 'Category',
            'category_helper'      => '',
            'question_text'        => 'Question Text',
            'question_text_helper' => '',
            'created_at'           => 'Created at',
            'created_at_helper'    => '',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => '',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => '',
            'image'                => 'Choose Image'
        ],
    ],
    'option'         => [
        'main_title'    =>  'Manage Options',
        'title'          => 'Options',
        'title_singular' => 'Option',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'question'           => 'Question',
            'question_helper'    => '',
            'option_text'        => 'Option Text',
            'option_text_helper' => '',
            'points'             => 'Points',
            'points_helper'      => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'result'         => [
        'title'          => 'Results',
        'title_singular' => 'Result',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'user'                => 'User',
            'user_id'             => 'User ID',
            'user_email'          => 'Email',
            'category'            => 'Category',
            'mark_scored'         => 'Mark scored',
            'incorrect'           => 'Incorrect',
            'not_attended'        => 'Unattended',
            'total_qns'           => 'Total Questions',
            'percentage'           => 'Percentage Scored',
            'weak_area'           => 'Weak Area',
            'strong_area'         => 'Strong Area',
            'weak_areas'          => 'Weak Area(s)',
            'strong_areas'        => 'Strong Area(s)',
            'user_helper'         => '',
            'total_points'        => 'Total Points',
            'total_points_helper' => '',
            'questions'           => 'Questions',
            'questions_helper'    => '',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Attended at',
            'updated_at_helper'   => '',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => '',
        ],

        'incorrect_fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'user'                => 'User',
            'user_id'             => 'User ID',
            'user_email'          => 'Email',
            'category'            => 'Category',
            'weak_area'           => 'Weak Area',
            'strong_area'         => 'Strong Area',
            'weak_areas'          => 'Weak Area(s)',
            'strong_areas'        => 'Strong Area(s)',
            'user_helper'         => '',
            'total_points'        => 'Total Points',
            'total_points_helper' => '',
            'questions'           => 'Question ID',
            'question_text'       => 'Question',
            'choice_id'           => 'You Answerd',
            'your_choice_text'    => 'Your Choice',
            'correct_choice_id'   => 'Correct Choice ID',
            'your_answer'         => 'Your Answer',
            'correct_answer'      => 'Correct Answer',
            'correct_choice_text' => 'Correct Choice',
            'questions_helper'    => '',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => '',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => '',
        ],
    ],
];
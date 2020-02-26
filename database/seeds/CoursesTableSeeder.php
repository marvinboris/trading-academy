<?php

use App\Course;
use App\Teacher;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $teacher = Teacher::first()->id;

        $description = "
        <p>
            <strong>
                Do you want to supercharge your HTML, CSS & PHP knowledge and learn how to turn them into a real business that can make you more money as a freelancer?
            </strong>
        </p>
        <p>
        Whether you're a freelance designer, entrepreneur, employee for a company, code hobbyist, or looking for a new career — this course gives you an immensely valuable skill that will enable you to either:
        </p>

        <strong>
        Make money on the side
        </strong>

        <p>
        So you can save up for that Hawaiian vacation you've been wanting, help pay off your debt, your car, your mortgage, or simply just to have bonus cash laying around.
        </p>

        <strong>
        Create a full-time income
        </strong>

        <p>
        WordPress developers have options. Many developers make a generous living off of creating custom WordPress themes and selling them on websites like ThemeForest. Freelance designers and developers can also take on WordPress projects and make an extra $1,000 - $5,000+ per month.
        </p>

        <p>
            <strong>
                <em>Who Should Take This Course?</em>
            </strong>
        </p>

        <strong>
        Graphic & Web Designers
        </strong>

        <p>
        Graphic designers are extremely talented, but ask them to code their designs and they'll freeze up! This leaves them with no other choice but to hire a web developer. Any professional graphic designers knows web developers can be expensive.
        </p>
        ";
        $course_content = json_encode([
            [
                'title' => 'Introduction',
                'content' => [
                    'What is online Trading ?',
                    'Basics',
                    'History of Trading',
                    'Crypto Trading',
                ]
            ],
            [
                'title' => 'Introduction',
                'content' => [
                    'What is online Trading ?',
                    'Basics',
                    'History of Trading',
                    'Crypto Trading',
                ]
            ],
            [
                'title' => 'Introduction',
                'content' => [
                    'What is online Trading ?',
                    'Basics',
                    'History of Trading',
                    'Crypto Trading',
                ]
            ],
            [
                'title' => 'Introduction',
                'content' => [
                    'What is online Trading ?',
                    'Basics',
                    'History of Trading',
                    'Crypto Trading',
                ]
            ],
        ]);
        $what_you_will_learn = json_encode([
            'Professional risk management.',
            'To identify Support (demand) and Resistance (supply).',
            'Buying and selling actions of professionals.',
            'To understand and apply different order types.',
            'To build and manage a personalized Trading Plan.',
            'To recognize technical chart patterns and monitoring trends.',
            'To use Fibonacci studies.',
        ]);
        $requirements = json_encode([
            'Have a basic understanding of HTML, CSS and PHP (all courses I offer)',
            'Have access to a code editor, free or otherwise. I suggest Coda 2, as that\'s the editor I use exclusively.',
            'An Internet connection is required.',
            'A fresh copy of Bootstrap and WordPress (we will go over this in the beginning of the course).',
            'Download & Install MAMP (or alternatives — we cover this in the course)',
        ]);
        $includes = json_encode([
            'videos' => '23:47:22 Hours On demand videos',
            'lessons' => '17 lessons',
            'access' => 'Full lifetime access',
            'media' => 'Access on mobile and tv',
        ]);

        $bronze = [
            'title' => 'Bronze',
            'photo_id' => 2,
            'subtitle' => 'Get Started with Crypto Currency Trading',
            'teacher_id' => $teacher,
            'description' => $description,
            'course_content' => $course_content,
            'what_you_will_learn' => $what_you_will_learn,
            'requirements' => $requirements,
            'includes' => $includes,
            'price' => 230,
            'duration' => 2,
            'level_rank' => 1,
            'level_name' => 'Bronze Level',
        ];
        
        $silver = [
            'title' => 'Silver',
            'photo_id' => 3,
            'subtitle' => 'Get Started with Crypto Currency Trading',
            'teacher_id' => $teacher,
            'description' => $description,
            'course_content' => $course_content,
            'what_you_will_learn' => $what_you_will_learn,
            'requirements' => $requirements,
            'includes' => $includes,
            'price' => 230,
            'duration' => 2,
            'level_rank' => 2,
            'level_name' => 'Silver Level',
        ];
        
        $diamond = [
            'title' => 'Diamond',
            'photo_id' => 4,
            'subtitle' => 'Get Started with Crypto Currency Trading',
            'teacher_id' => $teacher,
            'description' => $description,
            'course_content' => $course_content,
            'what_you_will_learn' => $what_you_will_learn,
            'requirements' => $requirements,
            'includes' => $includes,
            'price' => 230,
            'duration' => 2,
            'level_rank' => 3,
            'level_name' => 'Diamond Level',
        ];

        Course::create($bronze);
        Course::create($silver);
        Course::create($diamond);
    }
}

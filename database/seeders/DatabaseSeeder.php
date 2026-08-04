<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Administrator or User if needed
        \App\Models\Project::create([
            'title' => 'CodeFlow CRM Platform',
            'category' => 'Web Dev',
            'thumbnail' => 'projects/crm.png',
            'description' => 'A next-generation customer relationship management platform featuring deep analytical insights, real-time active user telemetry, and glowing interface layouts.',
            'tech_stack' => ['Laravel 12', 'Tailwind CSS v4', 'Alpine.js', 'MySQL', 'Highcharts'],
            'live_demo' => 'https://crm.codeflow.test',
            'github' => 'https://github.com/codeflow/crm-platform',
            'images' => ['projects/crm.png', 'projects/erp.png', 'projects/mobile.png'],
            'plans' => [
                [
                    'name' => 'SaaS Startup',
                    'price' => '$49',
                    'billing_period' => 'month',
                    'features' => ['Hosted on CodeFlow cloud', '5 User accounts', 'Basic telemetry & analytics', 'Daily backups', 'Email Support'],
                    'is_popular' => false
                ],
                [
                    'name' => 'Dedicated Setup',
                    'price' => '$799',
                    'billing_period' => 'one-time',
                    'features' => ['Deploy on your own server', 'Unlimited users & data', 'Full database setup & config', '3 Months maintenance', 'Highcharts integration'],
                    'is_popular' => true
                ],
                [
                    'name' => 'Source Code License',
                    'price' => '$2,499',
                    'billing_period' => 'one-time',
                    'features' => ['Complete editable source code', 'Self-hosting & lifetime ownership', 'White-labeling allowed', 'Developer documentation', 'Priority dev support'],
                    'is_popular' => false
                ]
            ]
        ]);

        \App\Models\Project::create([
            'title' => 'Titan Automated ERP System',
            'category' => 'Custom Systems',
            'thumbnail' => 'projects/erp.png',
            'description' => 'Enterprise resource planning software orchestrating back-office supply chains, internal warehouse systems, billing, and API endpoints.',
            'tech_stack' => ['Laravel 12', 'PostgreSQL', 'Redis', 'Docker', 'Vite'],
            'live_demo' => 'https://titan.codeflow.test',
            'github' => 'https://github.com/codeflow/titan-erp',
            'images' => ['projects/erp.png', 'projects/crm.png', 'projects/mobile.png'],
            'plans' => [
                [
                    'name' => 'SaaS Standard',
                    'price' => '$99',
                    'billing_period' => 'month',
                    'features' => ['Hosted ERP access', 'Up to 20 user seats', 'Warehouse telemetry', 'Automated billing'],
                    'is_popular' => false
                ],
                [
                    'name' => 'Managed Cloud ERP',
                    'price' => '$999',
                    'billing_period' => 'year',
                    'features' => ['Dedicated Docker container', 'Unlimited users', 'Automated secure backups', 'Full REST API access', 'Email & Slack Support'],
                    'is_popular' => true
                ],
                [
                    'name' => 'Enterprise Source License',
                    'price' => '$5,999',
                    'billing_period' => 'one-time',
                    'features' => ['Full PostgreSQL & PHP Source Code', 'Custom third-party integrations', 'On-site staff training sessions', '1-year priority development support'],
                    'is_popular' => false
                ]
            ]
        ]);

        \App\Models\Project::create([
            'title' => 'Nebula Client Application',
            'category' => 'Mobile Apps',
            'thumbnail' => 'projects/mobile.png',
            'description' => 'A cyber-style iOS & Android mobile application showing ambient user telemetry, health tracker statistics, and biometric authentication.',
            'tech_stack' => ['React Native', 'Laravel API', 'Tailwind', 'Expo', 'JWT'],
            'live_demo' => 'https://nebula.codeflow.test',
            'github' => 'https://github.com/codeflow/nebula-app',
            'images' => ['projects/mobile.png', 'projects/crm.png', 'projects/erp.png'],
            'plans' => [
                [
                    'name' => 'Managed App Rental',
                    'price' => '$79',
                    'billing_period' => 'month',
                    'features' => ['White-labeled mobile app', 'Uploaded to App & Play Store', 'Hosted Laravel API backend', 'Push notifications support'],
                    'is_popular' => false
                ],
                [
                    'name' => 'Store Launch Package',
                    'price' => '$1,499',
                    'billing_period' => 'one-time',
                    'features' => ['Store submission on your accounts', 'Custom biometric config', '6 Months app updates', 'Basic promo page setup'],
                    'is_popular' => true
                ],
                [
                    'name' => 'Mobile Source Code',
                    'price' => '$3,499',
                    'billing_period' => 'one-time',
                    'features' => ['Full React Native code & Expo setup', 'Full Laravel API source code', 'Lifetime self-deployment license', 'Priority App Store support'],
                    'is_popular' => false
                ]
            ]
        ]);
    }
}

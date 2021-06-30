<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MiscMst;

class MiscSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.EDUCATION'),
            'misc_title'    => 'Secondary-Level (8~9yrs)',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.EDUCATION'),
            'misc_title'   => 'High-School (10~12yrs)',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.EDUCATION'),
            'misc_title'   => 'College Aabove (13yrs above)',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.EDUCATION'),
            'misc_title'   => 'No-Preference',
        ]);

        MiscMst::insert([
            'misc_type'     => config('constant.MISC.EMP_TYPE'),
            'misc_title'   => 'APS',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.EMP_TYPE'),
            'misc_title'   => 'Fresh New',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.EMP_TYPE'),
            'misc_title'   => 'Ex-SG',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.EMP_TYPE'),
            'misc_title'   => 'Ex-Abroad',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.EMP_TYPE'),
            'misc_title'   => 'No Preference',
        ]);
        
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.RELIGION'),
            'misc_title'    => 'Hindu',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.RELIGION'),
            'misc_title'    => 'Muslim',
        ]);

        MiscMst::insert([
            'misc_type'     => config('constant.MISC.LANGUAGE'),
            'misc_title'    => 'Simple English',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.LANGUAGE'),
            'misc_title'    => 'Good English',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.LANGUAGE'),
            'misc_title'    => 'Malay',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.LANGUAGE'),
            'misc_title'    => 'Chinese/Mandarin',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.LANGUAGE'),
            'misc_title'    => 'No-Preference',
        ]);

        MiscMst::insert([
            'misc_type'     => config('constant.MISC.NATIONALITY'),
            'misc_title'    => 'Indonesia',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.NATIONALITY'),
            'misc_title'    => 'Philippines',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.NATIONALITY'),
            'misc_title'    => 'Myanmar',
        ]);

        MiscMst::insert([
            'misc_type'     => config('constant.MISC.SERVICES'),
            'misc_title'    => 'Infant Care',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.SERVICES'),
            'misc_title'    => 'Child/Ren Care',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.SERVICES'),
            'misc_title'    => 'Elderly Care',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.SERVICES'),
            'misc_title'    => 'Care for Disabled',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.SERVICES'),
            'misc_title'    => 'Housework & Cooking',
        ]);

        MiscMst::insert([
            'misc_type'     => config('constant.MISC.WORK'),
            'misc_title'    => 'Care of infants/Children',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.WORK'),
            'misc_title'    => 'Special needs/Disabled Care',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.WORK'),
            'misc_title'    => 'Elderly Care',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.WORK'),
            'misc_title'    => 'Cooking',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.WORK'),
            'misc_title'    => 'General Housework',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.WORK'),
            'misc_title'    => 'Care of Pets',
        ]);

        MiscMst::insert([
            'misc_type'     => config('constant.MISC.ILLNESSES'),
            'misc_title'    => 'Mental illness',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.ILLNESSES'),
            'misc_title'    => 'Epilepsy',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.ILLNESSES'),
            'misc_title'    => 'Asthma',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.ILLNESSES'),
            'misc_title'    => 'Diabetes',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.ILLNESSES'),
            'misc_title'    => 'Hupertension',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.ILLNESSES'),
            'misc_title'    => 'Tuberculosis',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.ILLNESSES'),
            'misc_title'    => 'Heart disease',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.ILLNESSES'),
            'misc_title'    => 'Malaria',
        ]);
        MiscMst::insert([
            'misc_type'     => config('constant.MISC.ILLNESSES'),
            'misc_title'    => 'Operations',
        ]);
    }
}

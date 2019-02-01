<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(1);

            $table->integer('registration_number')->nullable();
            $table->string('gender')->nullable();

            $table->string('maid_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();

            $table->string('address')->nullable();
            $table->string('adr1')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('dob')->nullable();
            $table->string('city_of_birth')->nullable();
            $table->string('country')->nullable();
            $table->string('nationality')->nullable();
            $table->date('residence_date_expiry')->nullable();
            $table->string('social_security_num')->nullable();
            $table->string('family_status')->nullable();
            $table->integer('dependents_num')->nullable();
            $table->integer('childs_num')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('benificiary')->nullable();
            $table->string('bic_iban')->nullable();
            $table->string('collective_agreement')->nullable();
            $table->string('profile_type')->nullable();
            $table->string('model_bulletin')->nullable();
            $table->string('classification_code')->nullable();
            $table->string('entry_date')->nullable();
            $table->string('seniority_date')->nullable();
            $table->string('seniority_date2')->nullable();
            $table->integer('trial_duration')->nullable();
            $table->string('employement')->nullable();
            $table->string('qualification')->nullable();
            $table->string('benchmark_employment')->nullable();
            $table->string('organizational_section')->nullable();
            $table->string('insee_code')->nullable();
            $table->string('contract_type')->nullable();
            $table->date('release_date')->nullable();
            $table->string('contract_nature')->nullable();
            $table->string('replaced_employee')->nullable();
            $table->string('reason')->nullable();
            $table->string('work_type')->nullable();
            $table->date('suspended_from')->nullable();
            $table->date('suspended_to')->nullable();
            $table->string('suspension_reason')->nullable();
            $table->string('salary_type')->nullable();
            $table->string('level')->nullable();
            $table->string('echelon')->nullable();
            $table->string('position')->nullable();
            $table->string('spinneret')->nullable();
            $table->string('coef')->nullable();
            $table->decimal('hours_nb')->nullable();
            $table->decimal('collective_hours')->nullable();
            $table->string('pro_expenses')->nullable();
            $table->decimal('abatement_rate')->nullable();
            $table->string('abatement_type')->nullable();
            $table->decimal('at_rate')->nullable();
            $table->decimal('transport_rate')->nullable();
            $table->integer('apprentice_year')->nullable();
            $table->date('apprentice_start')->nullable();
            $table->date('apprentice_end')->nullable();
            $table->decimal('apprentice_percentage')->nullable();
            $table->decimal('apprentice_salary')->nullable();
            $table->string('apprentice_type')->nullable();
            $table->string('half_time')->nullable();
            $table->decimal('half_time_percentage')->nullable();
            $table->date('half_time_start')->nullable();
            $table->date('half_time_end')->nullable();
            $table->decimal('salary_amount')->nullable();
            $table->decimal('salary_hours')->nullable();
            $table->decimal('work_time_amount')->nullable();
            $table->decimal('work_time_hours')->nullable();
            $table->decimal('work_time_rate')->nullable();
            $table->decimal('paid_break_amount')->nullable();
            $table->decimal('paid_break_hours')->nullable();
            $table->decimal('paid_break_rate')->nullable();
            $table->integer('theoritical_days')->nullable();
            $table->integer('days_remaining')->nullable();
            $table->integer('exercise')->nullable();
            $table->integer('period')->nullable();
            $table->string('pay_start_date')->nullable();
            $table->string('pay_end_date')->nullable();
            $table->string('payroll_date')->nullable();
            $table->decimal('conventional_min')->nullable();
            $table->decimal('mensual_salary')->nullable();
            $table->decimal('il_amount')->nullable();
            $table->decimal('idr_amount')->nullable();
            $table->integer('ticket_restaurant')->nullable();
            $table->decimal('wage_costs')->nullable();
            $table->decimal('employer_contributions')->nullable();
            $table->decimal('total_contribution')->nullable();
            $table->decimal('global_cost')->nullable();
            $table->decimal('hours')->nullable();
            $table->decimal('gross_total')->nullable();
            $table->decimal('tra_base')->nullable();
            $table->decimal('trb_base')->nullable();
            $table->decimal('trc_base')->nullable();
            $table->decimal('taxable')->nullable();
            $table->decimal('cp_base')->nullable();
            $table->decimal('cumulated_gross')->nullable();
            $table->decimal('tra_cumulated')->nullable();
            $table->decimal('trb_cumulated')->nullable();
            $table->decimal('trc_cumulated')->nullable();
            $table->decimal('taxable_cumulated')->nullable();
            $table->decimal('cp_base_cumulated')->nullable();
            $table->decimal('awarded_participation')->nullable();
            $table->decimal('payed_participation')->nullable();
            $table->decimal('invested_participation')->nullable();
            $table->decimal('abd_participation')->nullable();
            $table->decimal('awarded_profit_sharing')->nullable();
            $table->decimal('payed_profit_sharing')->nullable();
            $table->decimal('invested_profit_sharing')->nullable();
            $table->decimal('abd_profit_sharing')->nullable();
            $table->decimal('cp_earned')->nullable();
            $table->decimal('cp_taken')->nullable();
            $table->decimal('cp_left')->nullable();
            $table->decimal('seniority_days')->nullable();
            $table->decimal('split_days')->nullable();
            $table->decimal('rtt_acquired')->nullable();
            $table->decimal('rtt_taken')->nullable();
            $table->decimal('rtt_left')->nullable();
            $table->decimal('buyback_days')->nullable();
            $table->decimal('paid_cet')->nullable();
            $table->decimal('hs_contingent')->nullable();
            $table->decimal('rcl_acquired')->nullable();
            $table->decimal('rcl_taken')->nullable();
            $table->decimal('rcl_paidl')->nullable();
            $table->decimal('cet_rcl_paid')->nullable();
            $table->decimal('rcl_balance')->nullable();
            $table->decimal('rcr_acquired')->nullable();
            $table->decimal('rcr_paid')->nullable();
            $table->decimal('cet_rcr_paid')->nullable();
            $table->decimal('rcr_balance')->nullable();
            $table->decimal('cet_alimentation')->nullable();
            $table->decimal('cet_conso')->nullable();
            $table->decimal('cet_balance')->nullable();
            $table->decimal('cet_alimentation_time')->nullable();
            $table->string('driving_license')->nullable();
            $table->integer('works_council_member')->nullable();
            $table->integer('dp_member')->nullable();
            $table->integer('chsct_member')->nullable();
            $table->string('union_representative')->nullable();
            $table->text('data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}

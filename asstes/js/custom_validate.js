var validator = $('.form_validation_class').each(function() {
    $(this).validate({
        rules: {
            full_name: {
                required: true,
                minlength: 3,
                lettersonly: true,
            },
            update_full_name: {
                required: true,
                minlength: 3,
                lettersonly: true,
            },
            port_gender: {
                required: {
                    depends: function(element) {
                        if ('Choose gender' == $('#port_gender').val()) {
                            //Set predefined value to blank.
                            $('#port_gender').val('');
                        }
                        return true;
                    }
                }
            },
            port_group: {
                required: {
                    depends: function(element) {
                        if ('Choose your group' == $('#port_group').val()) {
                            //Set predefined value to blank.
                            $('#port_group').val('');
                        }
                        return true;
                    }
                }
            },
            pran: {
                // required: true,
                number: true,
                // maxlength:10,
                minlength: 12,
            },
            update_pran: {
                // required: true,
                number: true,
                // maxlength:10,
                minlength: 12,
            },
            port_date: {
                required: true,
                date: true,
                // goodDate:true,

            },
            hide_portname: {
                required: true,
                date: true,
                // goodDate:true,

            },
            portfolio_name: {

                // lettersonly:true,
                required: true,
                minlength: 4,
            },
            update_portfolio_name: {

                // lettersonly:true,
                required: {
                    depends: function(element) {
                        if ('Choose portfolio name' == $('#update_portfolio_name')
                            .val()) {
                            //Set predefined value to blank.
                            $('#update_portfolio_name').val('');
                        }
                        return true;
                    }
                },

            },
            select_valid: {
                required: true,
                // function(){
                // if($(".select_valid option[value='0']")){
                //   return true;
                // }else{
                //   return false;
                // }
                // }
            },
            cash_interest_rate: {
                maxlength: 3,
                number: true,
            },
            current_value: {
                required: true,
                maxlength: 5,
                number: true,
            },
            amt_invested: {
                required: true,
                maxlength: 8,
                number: true,
            },
            cashinhand_date: {
                required: true,
            },
            assets_present_value: {
                required: true,
                maxlength: 5,
                number: true,

            },
            assets_amt_invested: {
                required: true,
                maxlength: 10,
                number: true,
            },
            assets_quantity: {
                required: true,
                maxlength: 9,
                number: true,
            },
            assets_avg_price: {
                required: true,
                number: true,
                maxlength: 6,
                noSpace: false,
            },
            assets_date: {
                required: true,
            },
            update_group_value: {
                required: true,
                minlength: 3,
                // lettersonly:true,
            },
            update_group_name: {
                required: true,

            },
            group_name: {
                required: true,
                minlength: 3,
            },
            einsurance_no: {
                // required: true,
                number: true,
                minlength: 12,
            },
            update_einsurance_no: {
                // required: true,
                number: true,
                minlength: 12,
            },
            port_address: {
                required: true,
            },
            update_port_address: {
                required: true,
            },
            port_city: {
                required: true,
                lettersonly: true,
            },
            port_country: {
                required: true,
                lettersonly: true,
                number: false,
            },
            update_port_country: {
                required: true,
                lettersonly: true,
                number: false,
            },
            pin_code: {
                required: true,
                number: true,
                // maxlength:6,
                minlength: 5,
            },
            update_pin_code: {
                required: true,
                number: true,
                // maxlength:6,
                minlength: 5,
            },
            update_pan: {
                // required:true,
                // maxlength: 10,
                maxlength: 10,
                minlength: 9,
                // hasUppercase:true

            },//starting of investment validation
            //stock n share form
            sgb_stock_name:{
                required:true,
            },
            sgb_transaction_type:{
                required:true,
            },
            sgb_broker:{
                // required:true,
            },
            
            stock_date:{
                required:true,
            },
            stock_contract_no:{
                // required:true,
                number:true,
            },
            stock_settlement_no:{
                // required:true,
                number:true,
            },
            stock_qty:{
                required:true,
                number:true,
            },
            stock_purchase_price:{
                required:true,
                number:true,
            },
            stock_amt_invested:{
                required:true,
                number:true,
            },
            stock_broker:{
                // required:true,
                // number:true,
            },
            stock_net_rate:{
                // required:true,
                number:true,
            },
            stock_tax_value:{
                // required:true,
                number:true,
            },
            
            stock_cgst:{
                // required:true,
                number:true,
            },
            stock_sgst:{
                // required:true,
                number:true,
            },
            stock_igst:{
                // required:true,
                number:true,
            },
            stock_exchange_transaction:{
                // required:true,
                number:true,
            },
            stock_stt:{
                // required:true,
                number:true,
            },
            stock_sebi_fee:{
                // required:true,
                number:true,
            },
            
            stock_stamp_duty:{
                required:true,
                number:true,
            },
            
            stock_net_amt:{
                required:true,
                number:true,
            },
            //sukanya scheme form
            sukanya_transaction_type:{
                required:true,
                
            },
            sukanya_account_no:{
                required:true,
                number:true,
            },
            sukanya_opening_date:{
                required:true,
            },
            sukanya_maturity_date:{
                required:true,
            },
            sukanya_lockin_period:{
                required:true,
            },
            sukanya_date:{
                required:true,
            },
            sukanya_amt_invested:{
                required:true,
                
                number:true,
            },
            sukanya_interest_rate:{
                required:true,
                number:true,
            },
            //sgb form
            sgb_stock_name:{
                required:true,
            },
            sgb_transaction_type:{
                required:true,
            },
            sgb_broker:{
                // required:true,
                // number:true,
                
            },
            sgb_date:{
                required:true,
            },
            sgb_contract_no:{
                // required:true,
                number:true,
            },
            sgb_settlement_no:{
                // required:true,
                number:true,
            },
            sgb_qty:{
                required:true,
                number:true,
            },
            sgb_purchase_price:{
                required:true,
                number:true,
            },
            sgb_amt_invested:{
                required:true,
                number:true,
            },
            sgb_brokerage:{
                // required:true,
                number:true,
            },
            sgb_net_rate:{
                // required:true,
                number:true,
            },
            sgb_tax_value:{
                // required:true,
                number:true,
            },
            sgb_cgst:{
                // required:true,
                number:true,
            },
            sgb_sgst:{
                // required:true,
                number:true,
            },
            sgb_igst:{
                // required:true,
                number:true,
            },
            
            sgb_exchange_transaction:{
                // required:true,
                number:true,
            },
            
            sgb_stt:{
                // required:true,
                number:true,
            },
            sgb_sebi_fee:{
                // required:true,
                number:true,
            },
            sgb_stamp_duty:{
                // required:true,
                number:true,
            },
            sgb_net_amt:{
                required:true,
                number:true,
            },
             scss_transaction_type: {

                required: true,
            },
            scss_account_no: {

                required: true,
                number:true,
            },
            scss_muturity_date: {

                required: true,
            },
            scss_lockin_period: {

                required: true,
            },
            scss_date: {

                required: true,
            },
            scss_amt_invested: {

                required: true,
                number:true,
            },
            scss_interest_rate: {

                // required: true,
            },
            scss_interest_type: {

                required: true,
            },
            scss_interest_payment: {

                required: true,
                number:true,
            },
            scss_interest_payout: {

                required: true,
            },
            scss_maturity_amt: {

                required: true,
                number:true,
            },
            //next
            rd_type: {

                required: true,
            },
            rd_account_no: {

                required: true,
                number:true,
            },
            rd_transaction_type: {

                required: true,
            },
            rd_interest_payout: {

                required: true,
                number:true,
            },
            rd_interest_payment: {

                required: true,
                number:true,
            },
            rd_interest_type: {

                required: true,
            },
            rd_start_date: {

                required: true,
            },
            rd_amt_invested: {

                required: true,
                number:true,
            },
            rd_maturity_amt: {

                required: true,
                number:true,
            },
            rd_maturity_date: {

                required: true,
            },
            rd_interest_rate: {

                // required: true,
                number:true,
            },
            pe_asset_name: {

                required: true,
            },
            pe_startup: {

                required: true,
            },
            pe_start_date: {

                required: true,
            },
            pe_transaction_type: {

                required: true,
            },
            pe_date: {

                required: true,
            },
            pe_qty_purchase: {

                required: true,
                number:true,
            },
            pe_purchase_rate: {

                // required: true,
                number:true,
            },
            pe_amt_invested: {

                required: true,
                number:true,
            },
            pe_current_rate: {

                // required: true,
                number:true,
            },
            ppf_transaction_type: {

                required: true,
            },
            ppf_account_no: {

                required: true,
                number:true,
            },
            ppf_opening_date: {

                required: true,
            },
            ppf_maturity_date: {

                required: true,
            },
            ppf_lockin_period: {

                required: true,
            },
            ppf_date: {

                required: true,
            },
            ppf_amt_invested: {

                required: true,
                number:true,
            },
            ppf_interest_rate: {

                // required: true,
                   number:true,
            },
            nsc_transaction_type: {

                required: true,
            },
            nsc_account_no: {

                required: true,
                number:true,
            },
            nsc_type: {

                required: true,
            },
            nsc_opening_date: {

                required: true,
            },
            nsc_lockin_period: {

                required: true,
            },
            nsc_amt_invested: {

                required: true,
                number:true,
            },
            nsc_interest_rate: {

                // required: true,
                number:true,
            },
            nsc_maturity_date: {

                required: true,
            },
            nsc_maturity_amt: {

                required: true,
                number:true,
            },
            nps_pran_no: {

                required: true,
                number:true,
            },
            nps_opening_date: {

                required: true,
            },
            nps_type: {

                required: true,
            },
            nps_scheme: {

                required: true,
            },
            nps_transaction_type: {

                required: true,
            },
            nps_date: {

                required: true,
            },
            nps_qty: {

                required: true,
                number:true,
            },
            nps_purchase_price: {

                required: true,
                number:true,
            },
            nps_amt_invested: {

                required: true,
                number:true,
            },
            ncd_type: {

                required: true,
            },
            ncd_name: {

                required: true,
            },
            ncd_transaction_type: {

                required: true,
            },
            ncd_date: {

                required: true,
            },
            ncd_purchase_price: {

                required: true,
                number:true,
            },
            ncd_quantity: {

                required: true,
                number:true,
            },
            ncd_amt_invested: {

                required: true,
                number:true,
            },
            ncd_interest_payout: {

                required: true,
                number:true,
            },
            ncd_interest_rate: {

                // required: true,
                number:true,
            },
            ncd_interest_payable: {

                // required: true,
                number:true,
            },
            ncd_maturity_date: {

                required: true,
            },
            ncd_locking_period: {

                required: true,
            },
            mutual_company_name: {

                required: true,
            },
            mutual_scheme: {

                required: true,
            },
            mutual_folio_no: {

                required: true,
                number:true,
            },
            mutual_transaction: {

                required: true,
            },
            mutual_type: {

                required: true,
            },
            mutual_sip_date: {

                required: true,
            },
            mutual_advisor: {

                required: true,
            },
            mutual_date: {

                required: true,
            },
            mutual_quantity: {

                required: true,
                number:true,
            },
            mutual_nav: {

                required: true,
                number:true,
            },
            mutual_amt_invested: {

                required: true,
                number:true,
            },
            mutual_stamp_charge: {

                // required: true,
                number:true,
            },
            mutual_exit_load: {
                // required: true,
                number:true,
            },
            kisan_transaction_type: {

                required: true,
            },
            kisan_account_no: {

                required: true,
                number:true,
            },
            kisan_start_date: {

                required: true,
            },
            kisan_muturity_date: {

                required: true,
            },
            kisan_lockin_period: {

                required: true,
            },
            kisan_amt_invested: {

                required: true,
                number:true,
            },
            kisan_maturity_amt: {

                required: true,
                number:true,
            },
            kisan_interest_rate: {

                // required: true,
                number:true,
            },
            fd_type: {

                required: true,
            },
            fd_account_no: {

                required: true,
                number:true,
            },
            fd_transaction_type: {

                required: true,
            },
            fd_interest_payout: {

                // required: true,
                number:true,
            },
            fd_interest_payment: {

                // required: true,
                number:true,
            },
            fd_interest_type: {

                required: true,
            },
            fd_start_date: {

                required: true,
            },
            fd_amt_invested: {

                required: true,
                number:true,
            },
            fd_maturity_amt: {

                required: true,
                number:true,
            },
            fd_maturity_date: {

                required: true,
            },
            fd_interest_rate: {

                // required: true,
                number:true,
            },
            epf_transaction_type: {

                required: true,
            },
            epf_account_no: {

                required: true,
                number:true,
            },
            epf_start_date: {

                required: true,
            },
            epf_maturity_date: {

                required: true,
            },
            epf_lockin_date: {

                required: true,
            },
            epf_contribution_date: {

                required: true,
            },
            epf_interest_rate: {

                // required: true,
                number:true,
            },
            epf_employee_contribution: {

                required: true,
                number:true,
            },
            epf_employer_contribution: {

                required: true,
                number:true,
            },
            epf_total_contribution: {

                required: true,
                number:true,
            },
            //liability
            loan_bank_name: {

                required: true,
            },

            loan_account_no: {

                required: true,
                number:true,
            },

            loan_start_date: {

                required: true,
            },

            loan_amount: {

                required: true,
                number:true,
            },

            loan_period: {

                required: true,
                number:true,
            },

            loan_end_date: {

                required: true,
            },

            loan_emi_amt: {

                required: true,
                number:true,
            },

            loan_emi_date: {

                required: true,
            },

            loan_total_emipaid: {

                required: true,
                number:true,
            },

            loan_processing_fees: {

                // required: true,
                number:true,
            },

            loan_downpayment_amt: {

                required: true,
                number:true,
            },

            loan_balance_amt: {

                required: true,
                number:true,
            },

            loan_pre_emi_amt: {

                required: true,
                number:true,
            },

            loan_topup_amt: {

                required: true,
                number:true,
            },

            loan_Interest_rate_type: {

                required: true,
            },

            loan_fixed_rate_value: {

                required: true,
                number:true,
            },

            floating_date_from: {

                required: true,
            },
            floating_date_to: {

                required: true,
            },
            loan_floating_value: {

                required: true,
                number:true,
            },
            ppf_date: {

                required: true,
            },
            ppf_date: {

                required: true,
            },
            pan: {
                // required:true,
                // maxlength: 10,
                maxlength: 10,
                minlength: 9
                    // hasUppercase:true

            }
        },
        messages: {

            full_name: {
                minlength: "Please enter atleast 3 characters"
            },
            portfolio_name: {
                required: "This field is required",
                maxlength: "Max length 3 characters "
            },
            port_date: {
                required: "This field is required",
                date: "date is required!"

            },
            pin_code: {
                required: "This field is required",
                number: "Enter only number",
                maxlength: "Max length 5 digits"
            },
            port_country: {
                required: "This field is required",
                lettersonly: "Only letters allow"
            },
            port_city: {
                required: "This field is required",
                lettersonly: "Only letters allow"
            },
            port_address: {
                required: "This field is required"
            },
            einsurance_no: {
                // required: "this field is required!!",
                number: "Enter only number"
            },
            group_name: {
                required: "This field is required",
                minlength: "Please enter atleast 3 characters"
            },
            update_group_name: {
                required: "This field is required"

            },
            update_group_value: {
                required: "This field is required",
                minlength: "Please enter atleast 3 characters"
                    // lettersonly:true,
            },
            assets_date: {
                required: "This field is required"
            },
            assets_quantity: {
                required: "This field is required",
                maxlength: "Max length reached..",
                number: "Enter only number"
            },
            assets_avg_price: {
                required: "Enter avg price",
                number: "Enter only number",
                maxlength: "Max length reached.."

            },
            assets_amt_invested: {
                required: "This field is required",
                maxlength: "Maximum amount reached",
                number: "Enter only number",

            },
            assets_present_value: {
                required: "This field is required",
                maxlength: "Maximum value limit is 5",
                number: "Enter only number"

            },
            cash_interest_rate: {
                number: "Enter only number"

            },
            cashinhand_date: {
                required: "Date is required!"
            },
            amt_invested: {
                required: "This field is required",
                maxlength: "Maximum amount reached",
                number: "Enter only number"
            },
            current_value: {
                required: "This field is required",
                maxlength: "Max 5 limit",
                number: "Enter only number"
            },
            select_valid: {
                required: "This field is required"
                    // function(){
                    // if($(".select_valid option[value='0']")){
                    //   return true;
                    // }else{
                    //   return false;
                    // }
                    // }
            },
            pan: {
                required: "This field is required",
                maxlength: "Enter valid pan number",
                minlength: "Enter valid pan number"
            },
            port_gender: {
                required: "This field is required"

            },
            port_group: {
                required: "This field is required"
            },
            pran: {
                // required: "pran number",
                minlength: "Enter valid pran number "

            },//investment messages
            stock_purchase_price:{
                number:"Enter only number",
            },
            stock_amt_invested:{
                number:"Enter only number",
            },
            stock_net_rate:{
                number:"Enter only number",
            },
            stock_contract_no:{
                number:"Enter only number",
            },
            stock_settlement_no:{
                number:"Enter only number",
            },
            stock_brokerage:{
                number:"Enter only number",
            },
            stock_qty:{
                number:"Enter only number",
            },
            sukanya_amt_invested:{
                
                number:"Enter only number",
            },
                scss_account_no: {
                number:"Enter only number",
            },
                scss_amt_invested: {
                number:"Enter only number",
            },
                scss_interest_payment: {
                number:"Enter only number",
            },
                scss_maturity_amt: {
                number:"Enter only number",
            },
                rd_account_no: {
                number:"Enter only number",
            },
                rd_interest_payout: {
                number:"Enter only number",
            },
                rd_interest_payment: {
                number:"Enter only number",
            },
                rd_amt_invested: {
                number:"Enter only number",
            },
                rd_maturity_amt: {
                number:"Enter only number",
            },
                rd_interest_rate: {
                number:"Enter only number",
            },
                pe_qty_purchase: {
                number:"Enter only number",
            },
                pe_purchase_rate: {
                number:"Enter only number",
            },
                pe_amt_invested: {
                number:"Enter only number",
            },
                pe_current_rate: {
                number:"Enter only number",
            },
                ppf_account_no: {
                number:"Enter only number",
            },
                ppf_amt_invested: {
                number:"Enter only number",
            },
                nsc_account_no: {
                number:"Enter only number",
            },
                nsc_amt_invested: {
                number:"Enter only number",
            },
                nsc_interest_rate: {
                number:"Enter only number",
            },
                nsc_maturity_amt: {
                number:"Enter only number",
            },
                nps_pran_no: {
                number:"Enter only number",
            },
                nps_qty: {
                number:"Enter only number",
            },
                nps_purchase_price: {
                number:"Enter only number",
            },
                nps_amt_invested: {
                number:"Enter only number",
            },
                ncd_purchase_price: {
                number:"Enter only number",
            },
                ncd_quantity: {
                number:"Enter only number",
            },
                ncd_amt_invested: {
                number:"Enter only number",
            },
                ncd_interest_payout: {
                number:"Enter only number",
            },
                ncd_interest_rate: {
                number:"Enter only number",
            },
                ncd_interest_payable: {
                number:"Enter only number",
            },
                mutual_folio_no: {
                number:"Enter only number",
            },
                mutual_quantity: {
                number:"Enter only number",
            },
                mutual_nav: {
                number:"Enter only number",
            },
            mutual_amt_invested: {
                number:"Enter only number",
            },
            mutual_stamp_charge: {
                number:"Enter only number",
            },
            kisan_account_no: {
                number:"Enter only number",
            },
            kisan_amt_invested: {
                number:"Enter only number",
            },
            kisan_maturity_amt: {
                number:"Enter only number",
            },
            kisan_interest_rate: {
                number:"Enter only number",
            },
            fd_account_no: {
                number:"Enter only number",
            },
            fd_interest_payout: {
                number:"Enter only number",
            },
            fd_interest_payment: {
                number:"Enter only number",
            },
            fd_amt_invested: {
                number:"Enter only number",
            },
            fd_maturity_amt: {
                number:"Enter only number",
            },
            fd_interest_rate: {
                number:"Enter only number",
            },
            epf_account_no: {
                number:"Enter only number",
            },
            epf_interest_rate: {
                number:"Enter only number",
            },
            epf_employee_contribution: {
                number:"Enter only number",
            },
            epf_employer_contribution: {
                number:"Enter only number",
            },
            epf_total_contribution: {
                number:"Enter only number",
            },
            loan_account_no: {
                number:"Enter only number",
            },
            loan_amount: {
                number:"Enter only number",
            },
            loan_emi_amt: {
                number:"Enter only number",
            },
            loan_total_emipaid: {
                number:"Enter only number",
            },
            loan_processing_fees: {
                number:"Enter only number",
            },
            loan_downpayment_amt: {
                number:"Enter only number",
            },
            loan_balance_amt: {
                number:"Enter only number",
            },
            loan_pre_emi_amt: {
                number:"Enter only number",
            },
            loan_topup_amt: {
                number:"Enter only number",
            },
            loan_fixed_rate_value: {
                number:"Enter only number",
            },
           loan_floating_value: {
                number:"Enter only number"
            }


        }



    });

});
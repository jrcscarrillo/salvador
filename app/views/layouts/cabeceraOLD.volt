    <div class='fa-main'>
        <div id='header'>
            <ul>
                <li><a href='session/preferences'><img src='./public/img/preferences.gif' style='width:14px;height:14px;border:0;vertical-align:middle;padding-bottom:3px;' alt='Preferences'>&nbsp;&nbsp;Preferences</a></li>
                <li><a href='session/nuevaclave'><img src='./public/img/lock.gif' style='width:14px;height:14px;border:0;vertical-align:middle;padding-bottom:3px;' alt='Change Password'>&nbsp;&nbsp;Change password</a></li>
                <li><a href='http://documentacion.ecuadoraurora.club'><img src='./public/img/help.gif' style='width:14px;height:14px;border:0;vertical-align:middle;padding-bottom:3px;' alt='Help'>&nbsp;&nbsp;Help</a></li>  
                <li><a href='session/salir'><img src='./public/img/on_off.png' style='width:14px;height:14px;border:0;vertical-align:middle;padding-bottom:3px;' alt='Salir'>&nbsp;&nbsp;Salir</a></li></ul>
            <h1>Aurora Accounting 2.0<span style='padding-left:300px;'><img id='ajaxmark' src='./public/img/ajax-loader.gif' align='center' style='visibility:hidden;'></span></h1>
        </div>
        <div id='cssmenu'>
            <ul>
                <li class ='active has-sub'><a href='dashboard/ventas' accesskey='S'><span><u>S</u>ales</span></a>
                    <ul>
                        <li class='has-sub'><a href='#'><span>Transacciones</span></a>
                            <ul >
                                <li><a href='ventas/proforma'><span>Ventas <u>P</u>roformas</span></a></li>
                                <li><a href='pedidos'><span>Ventas <u>P</u>edidos</span></a></li>
                                <li><a href='../../sales/sales_order_entry.php?NewDelivery=0'><span>Direct <u>D</u>elivery</span></a></li>
                                <li><a href='../../sales/sales_order_entry.php?NewInvoice=0'><span>Direct <u>I</u>nvoice</span></a></li>
                                <li><a href='../../sales/inquiry/sales_orders_view.php?OutstandingOnly=1'><span><u>D</u>elivery Against Sales Orders</span></a></li>
                                <li><a href='../../sales/inquiry/sales_deliveries_view.php?OutstandingOnly=1'><span><u>I</u>nvoice Against Sales Delivery</span></a></li>
                                <li><a href='../../sales/inquiry/sales_orders_view.php?PrepaidOrders=Yes'><span>Invoice <u>P</u>repaid Orders</span></a></li>
                                <li><a href='../../sales/inquiry/sales_orders_view.php?DeliveryTemplates=Yes'><span><u>T</u>emplate Delivery</span></a></li>
                                <li><a href='../../sales/inquiry/sales_orders_view.php?InvoiceTemplates=Yes'><span><u>T</u>emplate Invoice</span></a></li>
                                <li><a href='../../sales/create_recurrent_invoices.php?'><span><u>C</u>reate and Print Recurrent Invoices</span></a></li>
                                <li><a href='../../sales/customer_payments.php?'><span>Customer <u>P</u>ayments</span></a></li>
                                <li><a href='../../sales/credit_note_entry.php?NewCredit=Yes'><span>Customer <u>C</u>redit Notes</span></a></li>
                                <li><a href='../../sales/allocations/customer_allocation_main.php?'><span><u>A</u>llocate Customer Payments or Credit Notes</span></a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'><span>Inquiries and Reports</span></a>
                            <ul >
                                <li><a href='../../sales/inquiry/sales_orders_view.php?type=32'><span>Sales Quotation I<u>n</u>quiry</span></a></li>
                                <li><a href='../../sales/inquiry/sales_orders_view.php?type=30'><span>Sales Order <u>I</u>nquiry</span></a></li>
                                <li><a href='../../sales/inquiry/customer_inquiry.php?'><span>Customer Transaction <u>I</u>nquiry</span></a></li>
                                <li><a href='../../sales/inquiry/customer_allocation_inquiry.php?'><span>Customer Allocation <u>I</u>nquiry</span></a></li>
                                <li><a href='../../reporting/reports_main.php?Class=0'><span>Customer and Sales <u>R</u>eports</span></a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'><span>Maintenance</span></a>
                            <ul >
                                <li><a href='../../sales/manage/customers.php?'><span>Add and Manage <u>C</u>ustomers</span></a></li>
                                <li><a href='../../sales/manage/customer_branches.php?'><span>Customer <u>B</u>ranches</span></a></li>
                                <li><a href='../../sales/manage/sales_groups.php?'><span>Sales <u>G</u>roups</span></a></li>
                                <li><a href='../../sales/manage/recurrent_invoices.php?'><span>Recurrent <u>I</u>nvoices</span></a></li>
                                <li><a href='../../sales/manage/sales_types.php?'><span>Sales T<u>y</u>pes</span></a></li>
                                <li><a href='../../sales/manage/sales_people.php?'><span>Sales <u>P</u>ersons</span></a></li>
                                <li><a href='../../sales/manage/sales_areas.php?'><span>Sales <u>A</u>reas</span></a></li>
                                <li><a href='../../sales/manage/credit_status.php?'><span>Credit <u>S</u>tatus Setup</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class =' has-sub'><a href='../../index.php?application=AP ' accesskey='P'><span><u>P</u>urchases</span></a>
                    <ul>
                        <li class='has-sub'><a href='#'><span>Transactions</span></a>
                            <ul >
                                <li><a href='../../purchasing/po_entry_items.php?NewOrder=Yes'><span>Purchase <u>O</u>rder Entry</span></a></li>
                                <li><a href='../../purchasing/inquiry/po_search.php?'><span><u>O</u>utstanding Purchase Orders Maintenance</span></a></li>
                                <li><a href='../../purchasing/po_entry_items.php?NewGRN=Yes'><span>Direct <u>G</u>RN</span></a></li>
                                <li><a href='../../purchasing/po_entry_items.php?NewInvoice=Yes'><span>Direct Supplier <u>I</u>nvoice</span></a></li>
                                <li><a href='../../purchasing/supplier_payment.php?'><span><u>P</u>ayments to Suppliers</span></a></li>
                                <li><a href='../../purchasing/supplier_invoice.php?New=1'><span>Supplier <u>I</u>nvoices</span></a></li>
                                <li><a href='../../purchasing/supplier_credit.php?New=1'><span>Supplier <u>C</u>redit Notes</span></a></li>
                                <li><a href='../../purchasing/allocations/supplier_allocation_main.php?'><span><u>A</u>llocate Supplier Payments or Credit Notes</span></a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'><span>Inquiries and Reports</span></a>
                            <ul >
                                <li><a href='../../purchasing/inquiry/po_search_completed.php?'><span>Purchase Orders <u>I</u>nquiry</span></a></li>
                                <li><a href='../../purchasing/inquiry/supplier_inquiry.php?'><span>Supplier Transaction <u>I</u>nquiry</span></a></li>
                                <li><a href='../../purchasing/inquiry/supplier_allocation_inquiry.php?'><span>Supplier Allocation <u>I</u>nquiry</span></a></li>
                                <li><a href='../../reporting/reports_main.php?Class=1'><span>Supplier and Purchasing <u>R</u>eports</span></a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'><span>Maintenance</span></a>
                            <ul >
                                <li><a href='../../purchasing/manage/suppliers.php?'><span><u>S</u>uppliers</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class =' has-sub'><a href='../../index.php?application=stock ' accesskey='I'><span><u>I</u>tems and Inventory</span></a>
                    <ul>
                        <li class='has-sub'><a href='#'><span>Transactions</span></a>
                            <ul >
                                <li><a href='../../inventory/transfers.php?NewTransfer=1'><span>Inventory Location <u>T</u>ransfers</span></a></li>
                                <li><a href='../../inventory/adjustments.php?NewAdjustment=1'><span>Inventory <u>A</u>djustments</span></a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'><span>Inquiries and Reports</span></a>
                            <ul >
                                <li><a href='../../inventory/inquiry/stock_movements.php?'><span>Inventory Item <u>M</u>ovements</span></a></li>
                                <li><a href='../../inventory/inquiry/stock_status.php?'><span>Inventory Item <u>S</u>tatus</span></a></li>
                                <li><a href='../../reporting/reports_main.php?Class=2'><span>Inventory <u>R</u>eports</span></a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'><span>Maintenance</span></a>
                            <ul >
                                <li><a href='../../inventory/manage/items.php?'><span><u>I</u>tems</span></a></li>
                                <li><a href='../../inventory/manage/item_codes.php?'><span><u>F</u>oreign Item Codes</span></a></li>
                                <li><a href='../../inventory/manage/sales_kits.php?'><span>Sales <u>K</u>its</span></a></li>
                                <li><a href='../../inventory/manage/item_categories.php?'><span>Item <u>C</u>ategories</span></a></li>
                                <li><a href='../../inventory/manage/locations.php?'><span>Inventory <u>L</u>ocations</span></a></li>
                                <li><a href='../../inventory/manage/item_units.php?'><span><u>U</u>nits of Measure</span></a></li>
                                <li><a href='../../inventory/reorder_level.php?'><span><u>R</u>eorder Levels</span></a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'><span>Pricing and Costs</span></a>
                            <ul >
                                <li><a href='../../inventory/prices.php?'><span>Sales <u>P</u>ricing</span></a></li>
                                <li><a href='../../inventory/purchasing_data.php?'><span>Purchasing <u>P</u>ricing</span></a></li>
                                <li><a href='../../inventory/cost_update.php?'><span>Standard <u>C</u>osts</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class =' has-sub'><a href='../../index.php?application=manuf ' accesskey='M'><span><u>M</u>anufacturing</span></a>
                    <ul>
                        <li class='has-sub'><a href='#'><span>Transactions</span></a>
                            <ul >
                                <li><a href='../../manufacturing/work_order_entry.php?'><span>Work <u>O</u>rder Entry</span></a></li>
                                <li><a href='../../manufacturing/search_work_orders.php?outstanding_only=1'><span><u>O</u>utstanding Work Orders</span></a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'><span>Inquiries and Reports</span></a>
                            <ul >
                                <li><a href='../../manufacturing/inquiry/bom_cost_inquiry.php?'><span>Costed Bill Of Material Inquiry</span></a></li>
                                <li><a href='../../manufacturing/inquiry/where_used_inquiry.php?'><span>Inventory Item Where Used <u>I</u>nquiry</span></a></li>
                                <li><a href='../../manufacturing/search_work_orders.php?'><span>Work Order <u>I</u>nquiry</span></a></li>
                                <li><a href='../../reporting/reports_main.php?Class=3'><span>Manufacturing <u>R</u>eports</span></a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'><span>Maintenance</span></a>
                            <ul >
                                <li><a href='../../manufacturing/manage/bom_edit.php?'><span><u>B</u>ills Of Material</span></a></li>
                                <li><a href='../../manufacturing/manage/work_centres.php?'><span><u>W</u>ork Centres</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class =' has-sub'><a href='../../index.php?application=assets ' accesskey='F'><span><u>F</u>ixed Assets</span></a>
                    <ul>
                        <li class='has-sub'><a href='#'><span>Transactions</span></a>
                            <ul >
                                <li><a href='../../purchasing/po_entry_items.php?NewInvoice=Yes&FixedAsset=1'><span>Fixed Assets <u>P</u>urchase</span></a></li>
                                <li><a href='../../inventory/transfers.php?NewTransfer=1&FixedAsset=1'><span>Fixed Assets Location <u>T</u>ransfers</span></a></li>
                                <li><a href='../../inventory/adjustments.php?NewAdjustment=1&FixedAsset=1'><span>Fixed Assets <u>D</u>isposal</span></a></li>
                                <li><a href='../../sales/sales_order_entry.php?NewInvoice=0&FixedAsset=1'><span>Fixed Assets <u>S</u>ale</span></a></li>
                                <li><a href='../../fixed_assets/process_depreciation.php'><span>Process <u>D</u>epreciation</span></a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'><span>Inquiries and Reports</span></a>
                            <ul >
                                <li><a href='../../inventory/inquiry/stock_movements.php?FixedAsset=1'><span>Fixed Assets <u>M</u>ovements</span></a></li>
                                <li><a href='../../fixed_assets/inquiry/stock_inquiry.php?'><span>Fixed Assets In<u>q</u>uiry</span></a></li>
                                <li><a href='../../reporting/reports_main.php?Class=7'><span>Fixed Assets <u>R</u>eports</span></a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'><span>Maintenance</span></a>
                            <ul >
                                <li><a href='#'><span><font color='gray'>Fixed <u>A</u>ssets</font></span></a></li>
                                <li><a href='../../inventory/manage/locations.php?FixedAsset=1'><span>Fixed Assets <u>L</u>ocations</span></a></li>
                                <li><a href='#'><span><font color='gray'>Fixed Assets <u>C</u>ategories</font></span></a></li>
                                <li><a href='#'><span><font color='gray'>Fixed Assets Cl<u>a</u>sses</font></span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class =' has-sub'><a href='../../index.php?application=proj ' accesskey='D'><span><u>D</u>imensions</span></a>
                    <ul>
                        <li class='has-sub'><a href='#'><span>Transactions</span></a>
                            <ul >
                                <li><a href='../../dimensions/dimension_entry.php?'><span>Dimension <u>E</u>ntry</span></a></li>
                                <li><a href='../../dimensions/inquiry/search_dimensions.php?outstanding_only=1'><span><u>O</u>utstanding Dimensions</span></a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'><span>Inquiries and Reports</span></a>
                            <ul >
                                <li><a href='../../dimensions/inquiry/search_dimensions.php?'><span>Dimension <u>I</u>nquiry</span></a></li>
                                <li><a href='../../reporting/reports_main.php?Class=4'><span>Dimension <u>R</u>eports</span></a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'><span>Maintenance</span></a>
                            <ul >
                                <li><a href='../../admin/tags.php?type=dimension'><span>Dimension <u>T</u>ags</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class =' has-sub'><a href='../../index.php?application=GL ' accesskey='B'><span><u>B</u>anking and General Ledger</span></a>
                    <ul>
                        <li class='has-sub'><a href='#'><span>Transactions</span></a>
                            <ul class='align_right'>
                                <li><a href='../../gl/gl_bank.php?NewPayment=Yes'><span><u>P</u>ayments</span></a></li>
                                <li><a href='../../gl/gl_bank.php?NewDeposit=Yes'><span><u>D</u>eposits</span></a></li>
                                <li><a href='../../gl/bank_transfer.php?'><span>Bank Account <u>T</u>ransfers</span></a></li>
                                <li><a href='../../gl/gl_journal.php?NewJournal=Yes'><span><u>J</u>ournal Entry</span></a></li>
                                <li><a href='../../gl/gl_budget.php?'><span><u>B</u>udget Entry</span></a></li>
                                <li><a href='../../gl/bank_account_reconcile.php?'><span><u>R</u>econcile Bank Account</span></a></li>
                                <li><a href='#'><span><font color='gray'>Revenue / <u>C</u>osts Accruals</font></span></a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'><span>Inquiries and Reports</span></a>
                            <ul class='align_right'>
                                <li><a href='../../gl/inquiry/journal_inquiry.php?'><span><u>J</u>ournal Inquiry</span></a></li>
                                <li><a href='../../gl/inquiry/gl_account_inquiry.php?'><span>GL <u>I</u>nquiry</span></a></li>
                                <li><a href='../../gl/inquiry/bank_inquiry.php?'><span>Bank Account <u>I</u>nquiry</span></a></li>
                                <li><a href='../../gl/inquiry/tax_inquiry.php?'><span>Ta<u>x</u> Inquiry</span></a></li>
                                <li><a href='../../gl/inquiry/gl_trial_balance.php?'><span>Trial <u>B</u>alance</span></a></li>
                                <li><a href='../../gl/inquiry/balance_sheet.php?'><span>Balance <u>S</u>heet Drilldown</span></a></li>
                                <li><a href='../../gl/inquiry/profit_loss.php?'><span><u>P</u>rofit and Loss Drilldown</span></a></li>
                                <li><a href='../../reporting/reports_main.php?Class=5'><span>Banking <u>R</u>eports</span></a></li>
                                <li><a href='../../reporting/reports_main.php?Class=6'><span>General Ledger <u>R</u>eports</span></a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'><span>Maintenance</span></a>
                            <ul class='align_right'>
                                <li><a href='../../gl/manage/bank_accounts.php?'><span>Bank <u>A</u>ccounts</span></a></li>
                                <li><a href='../../gl/manage/gl_quick_entries.php?'><span><u>Q</u>uick Entries</span></a></li>
                                <li><a href='../../admin/tags.php?type=account'><span>Account <u>T</u>ags</span></a></li>
                                <li><a href='../../gl/manage/currencies.php?'><span><u>C</u>urrencies</span></a></li>
                                <li><a href='../../gl/manage/exchange_rates.php?'><span><u>E</u>xchange Rates</span></a></li>
                                <li><a href='../../gl/manage/gl_accounts.php?'><span><u>G</u>L Accounts</span></a></li>
                                <li><a href='../../gl/manage/gl_account_types.php?'><span>GL Account <u>G</u>roups</span></a></li>
                                <li><a href='../../gl/manage/gl_account_classes.php?'><span>GL Account <u>C</u>lasses</span></a></li>
                                <li><a href='../../gl/manage/close_period.php?'><span><u>C</u>losing GL Transactions</span></a></li>
                                <li><a href='../../gl/manage/revaluate_currencies.php?'><span><u>R</u>evaluation of Currency Accounts</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class =' has-sub'><a href='../../index.php?application=system ' accesskey='E'><span><u>C</u>onfiguracion</span></a>
                    <ul>
                        <li class='has-sub'><a href='#'><span>Empresarial</span></a>
                            <ul class='align_right'>
                                <li><a href='contribuyente'><span><u>C</u>ontribuyentes</span></a></li>
                                <li><a href='users'><span><u>U</u>suarios</span></a></li>
                                <li><a href='modelos'><span><u>A</u>ccess Setup</span></a></li>
                                <li><a href='../../admin/display_prefs.php?'><span><u>D</u>isplay Setup</span></a></li>
                                <li><a href='../../admin/forms_setup.php?'><span>Transaction <u>R</u>eferences</span></a></li>
                                <li><a href='../../taxes/tax_types.php?'><span><u>T</u>axes</span></a></li>
                                <li><a href='../../taxes/tax_groups.php?'><span>Tax <u>G</u>roups</span></a></li>
                                <li><a href='../../taxes/item_tax_types.php?'><span>Item Ta<u>x</u> Types</span></a></li>
                                <li><a href='../../admin/gl_setup.php?'><span>System and <u>G</u>eneral GL Setup</span></a></li>
                                <li><a href='../../admin/fiscalyears.php?'><span><u>F</u>iscal Years</span></a></li>
                                <li><a href='../../admin/print_profiles.php?'><span><u>P</u>rint Profiles</span></a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'><span>Miscellaneous</span></a>
                            <ul class='align_right'>
                                <li><a href='../../admin/payment_terms.php?'><span>Pa<u>y</u>ment Terms</span></a></li>
                                <li><a href='../../admin/shipping_companies.php?'><span>Shi<u>p</u>ping Company</span></a></li>
                                <li><a href='../../sales/manage/sales_points.php?'><span><u>P</u>oints of Sale</span></a></li>
                                <li><a href='../../admin/printers.php?'><span><u>P</u>rinters</span></a></li>
                                <li><a href='../../admin/crm_categories.php?'><span>Contact <u>C</u>ategories</span></a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'><span>Maintenance</span></a>
                            <ul class='align_right'>
                                <li><a href='../../admin/void_transaction.php?'><span><u>V</u>oid a Transaction</span></a></li>
                                <li><a href='../../admin/view_print_transaction.php?'><span>View or <u>P</u>rint Transactions</span></a></li>
                                <li><a href='../../admin/attachments.php?filterType=20'><span><u>A</u>ttach Documents</span></a></li>
                                <li><a href='../../admin/system_diagnostics.php?'><span>System <u>D</u>iagnostics</span></a></li>
                                <li><a href='../../admin/backups.php?'><span><u>B</u>ackup and Restore</span></a></li>
                                <li><a href='../../admin/create_coy.php?'><span>Create/Update <u>C</u>ompanies</span></a></li>
                                <li><a href='../../admin/inst_lang.php?'><span>Install/Update <u>L</u>anguages</span></a></li>
                                <li><a href='../../admin/inst_module.php?'><span>Install/Activate <u>E</u>xtensions</span></a></li>
                                <li><a href='../../admin/inst_theme.php?'><span>Install/Activate <u>T</u>hemes</span></a></li>
                                <li><a href='../../admin/inst_chart.php?'><span>Install/Activate <u>C</u>hart of Accounts</span></a></li>
                                <li><a href='../../admin/inst_upgrade.php?'><span>Software <u>U</u>pgrade</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class='fa-body'>

            <div class='fa-footer'>
                <span class='power'><a href='http://documentacion.ecuadoraurora.club'>Aurora Accounting 2.0</a></span>
                <span class='date'></span>
                <span class='date'></span>
                <span class='date'></span>
                <span class='date'></span>
                <span class='date'></span>
            </div>
        </div>
    </div>


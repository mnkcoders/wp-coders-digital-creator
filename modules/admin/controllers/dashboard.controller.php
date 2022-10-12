<?php namespace CODERS\Framework\Controllers;
/**
 * Description of dasgboard
 *
 * @author Coder01
 */
final class DashboardController extends \CODERS\Framework\Response{
    
    protected function default_action(\CODERS\Framework\Request $request = NULL) {
        
        var_dump($request);
    }

    public function getPageTitle() {
        return __('Digital Creator','coders_digital_creator');
    }
    public function getMenuTitle() {
        return __('Creator','coders_digital_creator');
    }
}

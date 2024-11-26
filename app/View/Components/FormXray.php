<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormXray extends Component
{
  public $formType;

  /**
   * Membuat instance komponen baru.
   */
  public function __construct($formType = 'pscp') // Mengubah default menjadi 'pscp'
  {
    $this->formType = $formType;
  }

  /**
   * Dapatkan tampilan / konten yang mewakili komponen.
   */
  public function render(): View|Closure|string
  {
    switch ($this->formType) {
      case 'pscp':
        return view('components.pscp.form-pscp'); // Mengembalikan tampilan PSCP
      case 'hbscp':
        return view('components.hbscp.form-hbscp'); // Mengembalikan tampilan HBSCP
      default:
        return view('components.pscp.form-pscp'); // Tampilan default jika tidak ada yang cocok
    }
  }
}

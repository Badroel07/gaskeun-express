<?php

class Flasher
{
    public static function setFlash($pesan, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'tipe' => $tipe
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="p-4 mb-4 text-sm text-white rounded-lg ' .
                ($_SESSION['flash']['tipe'] == 'success' ? 'bg-green-500' : 'bg-red-500') . '">' .
                $_SESSION['flash']['pesan'] .
                '</div>';
            unset($_SESSION['flash']);
        }
    }
}

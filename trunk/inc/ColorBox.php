<?php
require_once dirname(__FILE__) . "/../fautoload.php";
//require_once dirname(__FILE__) . '/HtmlStruct.php';
//require_once dirname(__FILE__) . '/../classes/Login.php';
/**
 * Description of ColorBox
 *
 * @author Trtkal
 */
class ColorBox {
    protected $nick = null;
    protected $role_id = null;

    protected $loged = false;

    /**
     * Přihlásí uživatele
     */
    public function UserLogin() {

    }

    /**
     * Přidá titul do databáze
     */
    public function MovieAdd() {
        ;
    }

    /**
     * Přidá instanci filmu do databáze
     */
    public function CMovieAdd() {
        ;
    }

    /**
     * Přidá uživatele do databáze
     */
    public function UserAdd() {
        ;
    }

    /**
     * Přídá vypůjčujícího do databáze
     */
    public function BorrowerAdd() {
        ;
    }

    /**
     * Přidá jazyk titulu/titulků do databáze
     */
    public function LanguageAdd() {
        ;
    }
    /**
     * Přidá žánr filmu do databáze
     */
    public function GenreAdd() {
        ;
    }
    public function UserDelete() {
        ;
    }

    public static function Header() {
        return '
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link href="/style/modal.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="/style/print.css" rel="stylesheet" type="text/css" media="print" />
        ';
    }
    public static function DivModalStart() {
        return '<div id="modal">';
    }

    public function AddressAdd() {
        if(Login::IsAuthorized('Administrator')) {
            $page = HtmlStruct::Dtd();
            $page .= HtmlStruct::HeadStart('Přidání adresy');
            $page .= ColorBox::Header();
            $page .= HtmlStruct::SetFocus('street');
            $page .= HtmlStruct::BodyStart();
            $page .= ColorBox::DivModalStart();
            $page .= HtmlStruct::HeadingHx('1', 'Přidání adresy');

            if(isset($_POST['street'])) {
                include_once dirname(__FILE__) . '/../classes/BorrowerAddress.php';
                $borroweraddress = new BorrowerAddress();
                if($borroweraddress->Add($_POST['street'],$_POST['number'], $_POST['psc'], $_POST['city'])) {
                    $page .= HtmlStruct::HeadingHx('2', 'Přidání proběhlo v pořádku')."<p class=\"link\"><a href=\"".$_SERVER['PHP_SELF']."\">Přidat další adresu</a>, nebo <a href=\"./AddBorrower.php\">přidat půjčujícího</a></p>";
                } else {
                    $page .= HtmlStruct::HeadingHx('2', 'Nastala chyba');
                }
            } else {
                $page .= '<form id="add_address" action="'.$_SERVER['PHP_SELF'].'" method="post">
    <p>';
                $page .= HtmlStruct::InputTextReq('Ulice', 'street');
                $page .= HtmlStruct::InputTextReq('ČP', 'number');
                $page .= HtmlStruct::InputTextReq('PSČ', 'psc');
                $page .= HtmlStruct::InputTextReq('Město', 'city');
                $page.='</p>
    <div class="center"><input type="submit" value="Přidat" /></div>
</form>
';
            }
            $page .= '</div>';
            $page .= HtmlStruct::BodyEnd();
            return $page;
        } else {
            throw new Exception('Neoprávněný přístup', 22, '');
        }
    }
}
?>

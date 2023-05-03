<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <style>
        @media print {
            .pagebreak {
                page-break-before: always;
            }

            /* page-break-after works, as well */
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Mietvertrag</title>
</head>

<body>
    <div align="center">
        <h2>Mietvertrag</h2>
        <table class="table table-bordered">
            <tr>
                <td><b>Vermieter:</b> <u><?php echo $vertrag->vermieter; ?></u></td>
                <td><b>Mieter:<u></b><a href="<?php echo site_url('clients/view/').$client->client_id; ?>"><?php echo $client->client_name; ?></a></u></td>
            </tr>
        </table>
        <table class="table table-bordered">
            <tr>
                <td><b>§1 Mieträume</b><br>
                    Der Vermieter vermietet dem Mieter zu Wohnzwecken die im Hause: <u><?php echo $vertrag->adresse; ?></u>
                    Die Wohnfläche beträgt <u><?php echo $appartment->appartment_qm; ?></u>qm, vermietet wird: <u><?php echo $appartment->appartment_raume; ?></u>
                </td>
            </tr>
            <tr>
                <td><b>§2 Mietzins und Nebenkosten</b><br>
                    Miete und Nebenkosten sind ab Beginn der Mietzeit monatlich im Voraus zu bezahlen.
                    Die monatliche Grundmiete beträgt: <u><?php echo $vertrag->kaltmiete; ?> €</u>
                    Nebenkosten Pauschal: <u><?php echo $vertrag->nebenkosten; ?> €</u> (Siehe Nebenkostentabelle)
                    Insgesamt sind vom Mieter monatlich: <u><?php echo $vertrag->kaltmiete + $vertrag->nebenkosten; ?> €</u> auf das Konto mit der IBAN: <u><?php echo $vertrag->iban; ?></u> zu bezahlen.
                </td>
            </tr>
            <tr>
                <td><b>§3 Mietsicherheit/Kaution</b><br>
                    Der Mieter hat bei Beginn des Mietverhältnisses eine Mietsicherheit in Höhe von EUR <u><?php echo $vertrag->kaution; ?> <?php echo $vertrag->kautionart; ?></u> zuleistet. Ist die Kaution innerhalb von 2 Monaten nicht bezahlt, liegt eine Vertragsverletzung vor, die automatisch zu einer fristlosen kündigung führt.
                </td>
            </tr>
            <tr>
                <td><b>§4 Mietdauer und Kündigung</b><br>
                    Das Mietverhältnis beginnt am: <u><?php echo $vertrag->begin; ?></u> und läuft am <u><?php echo $vertrag->ende; ?></u> ab.
                    Eine Kündigung hat schriftlich zu erfolgen.
                    Setzt der Mieter den Gebrauch der Mietsache fort, so gilt das Mietverhältnis nicht als verlängert.</td>
            </tr>
            <tr>
                <td><b>§5 Selbstbeteiligung bei Schäden/Kleinreparaturen</b><br>
                    Selbstbeteiligung bei Kleinreparaturen wie (Installationen, Einrichtungen für Wasser, Strom, Gas, Heiz- und
                    Kocheinrichtungen sowie Rollläden, Jalousien, Fensterläden und Markisen, Steckdosen, Fenster und Türverschlüsse.) beträgt 200 EUR inkl. MwSt. im Jahr</td>
            </tr>
            <tr>
                <td><b>§6 Zustand der Mieträume</b><br>
                    Der Vermieter gewährt dem Mieter den Gebrauch der Mietsache in dem Zustand bei Übergabe. Dieser Zustand ist dem Vermieter bei Übergabe der Mietsache bekannt und wird in einem Protokoll festgehalten, welches wesentlicher Bestandteil des Mietvertrages ist.
                    Zu Beginn des Mietverhältnisses werden bekannte Mängel an der Mietsache werden vom Mieter als vertragsgemäß anerkannt. Eine verschuldensunabhängige Haftung des Vermieters für anfängliche Mängel wird ausgeschlossen.
                    Sollten noch Restarbeiten an der Mietsache durch den Vermieter durchgeführt sein, so kann die Übergabe der Mietsache an den Mieter nicht verweigert werden, sofern die Nutzung als Wohnung nur unerheblich beeinträchtigt ist.</td>
            </tr>
            <tr>
                <td><b>§7 Instandhaltung der Mietsache</b><br>
                    1. Der Mieter ist verpflichtet, die Mietsache und die gemeinschaftlichen Einrichtungen und Anlagen pfleglich und schonend zu behandeln.
                    Schäden am Haus und in den Mieträumen sind dem Vermieter unverzüglich anzuzeigen. Für durch verspätete Anzeige verursachte Schäden haftet der Mieter.
                    2. Der Mieter hat für ordnungsgemäße Reinigung der Mieträume sowie deren ausreichende Beheizung und Belüftung sowie Schutz der Innenräume vor Frost zu sorgen.
                    Der Mieter haftet dem Vermieter für Schäden, die durch die Verletzung seiner ihm obliegenden Obhuts-, Sorgfalts- und Anzeigepflicht schuldhaft verursacht werden. Er haftet in gleicher Weise für Schäden, die durch seine Angehörigen, Untermieter, Arbeiter, Angestellten, Handwerker und Personen, die sich mit seinem Willen in der Wohnung aufhalten oder ihn aufsuchen, verursacht werden.
                    Hat der Mieter oder der vorgenannte Personenkreis einen Schaden an der Mietsache verursacht, so hat er diesen unverzüglich dem Vermieter anzuzeigen.
                    Der Mieter hat Schäden, für die er einstehen muss, unverzüglich zu beseitigen. Kommt er dieser Verpflichtung auch nach schriftlicher Mahnung innerhalb einer angemessenen Frist nicht nach, so kann der Vermieter die erforderlichen Arbeiten auf Kosten des Mieters vornehmen lassen.
                    Der Mieter hat zu beweisen, dass ein Verschulden seinerseits nicht vorgelegen hat.</td>
            </tr>
            <tr>
                <td><b>§8 Benutzung der Mietsache</b><br>
                    1. Der Mieter darf die angemieteten Räume zu anderen als zu Wohnzwecken nur mit Erlaubnis des Vermieters benutzen.
                    Eine Zustimmung des Vermieters ist ebenfalls schriftlich erforderlich, wenn der Mieter an der Mietsache Um-, An-, und Einbauten, Installationen oder andere Veränderungen vornehmen will.
                    2. Die Parteien sind sich darüber einig, dass eine Untervermietung oder die Überlassung der Mietsache an Dritte der Zustimmung des Vermieters bedarf. 3. Die Haltung von Kleintieren ist dem Mieter ohne Zustimmung des Vermieters gestattet, soweit durch die Unterbringung in den Mieträumen eine Beeinträchtigung der Mietsache oder eine Belästigung von Hausbewohnern oder Nachbarn nicht gegeben ist. Die Haltung von Hunden und Katzen sowie anderer Tiere bedarf der Zustimmung des Vermieters.</td>
            </tr>
            <tr>
                <td><b>§9 Beendigung des Mietverhältnisses</b><br>
                    1. Rückgabe der Mietsache
                    Der Mieter hat dem Vermieter die Mietsache vollständig geräumt und gereinigt und mit sämtlichen, auch den vom Mieter beschafften, Schlüssel zu einem von beiden Parteien vereinbarten Termin zu übergeben. Über die Übergabe ist ein Protokoll zu erstellen.</td>
            </tr>
            <tr>
                <td><b>§10 Individuele Vereinbarung</b><br>
                    1. Um Privatsphäre bzw. Störungen zu vermeiden verpflichtet sich der Mieter hiermit für die Ablesung der Heizungsmessgeräte und der Warmwasserzähler(Zählernummer, Wert).
                    <br> 2. Die Ablesung hat Schriftlich oder Digital (Im Sinne von Fotos oder änlichem) zu erfolgen und muss mindestens alle 6 Monate gelesen werden.
                    <br> 3. Im Falle einer Fehlenden bzw. ungenauen oder unglaubwürdigen Protokollierung darf der Vermieter die Verbrauchswerte im normalen Maß (Durchschnitt der anderen Verbraucher) schätzen.

                </td>
            </tr>
        </table>
        <br>
        <table class="table table-bordered" style="font-size:8pt;">
            <tr>
                <td><b>Nebenkostentabelle:</b>
                    <br><b>Grundsteuer:</b><br>
                    Wird von der jeweiligen Kommune erhoben, teilweise stehen in Mietverträgen auch "öffentliche Lasten des Grundstücks".
                    <br><b>Heizung:</b><br>
                    Ölkosten für die Heizung.
                    <br><b>Warmwasser:</b><br>
                    Kosten der Warmwasserbereitung. (Küche,Bad etc.)
                    <br><b>Abwasser:</b><br>
                    Das sind Gebühren für die Nutzung einer öffentlichen Entwässerungsanlage oder die Kosten der Abfuhr und Reinigung einer eigenen Klär- oder Sickergrube.
                    <br><b>Straßenreinigung/Müllabfuhr:</b><br>
                    Kosten, die die Stadt dem Vermieter durch Abgabenbescheid in Rechnung stellt.
                    <br><b>Gartenpflege:</b><br>
                    Sach- und Personalkosten, die durch die Pflege der hauseigenen Grünanlage entstehen. Kosten für die Erneuerung von Pflanzen oder für die Pflege von Spielplätzen zählen mit.
                    <br><b>Schornsteinreinigung:</b><br>
                    Schornsteinfegerkosten (Kehrgebühren) und Kosten der Immissionsmessung.
                    <br><b>Hauswart:</b><br>
                    Personalkosten für den Hausmeister, der zum Beispiel Gartenpflege, Schneebeseitigung, Treppenhausreinigung usw. übernimmt.
                    <br>
                </td>
                <td><b>Einrichtung Wäschepflege:</b><br>
                    Kosten für die Waschküche, zum Beispiel auch für die Gemeinschafts Waschmaschinen oder Trockner, das heißt Strom, Reinigung und Wartung der Geräte.
                    <br><b>Wasserkosten:</b><br>
                    Hierzu zählen das Wassergeld, die Kosten der Wasseruhr und zum Beispiel auch die Kosten für eine Wasseraufbereitungsanlage.
                    <br><b>Fahrstuhl:</b><br>
                    Das sind Kosten des Betriebsstroms, der Beaufsichtigung, Bedienung, Überwachung, Pflege und Reinigung sowie regelmäßige Prüfung der Betriebssicherheit und Betriebsbereitschaft.
                    <br><b>Hausreinigung/Ungezieferbekämpfung:</b> <br>
                    Kosten, zum Beispiel für eine Putzfrau, die die Flure, Treppen, Keller, Waschküche usw. reinigt. Kosten der Ungezieferbekämpfung sind nur die laufenden Kosten, zum Beispiel Kosten für ein Insektenspray.
                    <br><b>Beleuchtung:</b><br>
                    Stromkosten für Außenbeleuchtung, Treppenhaus, Waschküche.
                    <br><b>Versicherungen:</b><br>
                    Gebäudeversicherungen gegen Feuer-, Sturm- und Wasserschäden, Glasversicherungen sowie Haftpflichtversicherungen für Gebäude, Öltank und Aufzug.
                    <br><b>Gemeinschaftsantenne/Breitbandkabel:</b><br>
                    Bei der Antenne können Betriebs-, Strom- und Wartungskosten auf die Mieter umgelegt werden. Beim Kabel kommt noch die monatliche, an die Telekom oder Kabel-Service-Gesellschaft zu zahlende Grundgebühr hinzu. Anders, wenn der Mieter einen Vertrag direkt mit der Telekom oder einer privaten Kabel-Service-Gesellschaft geschlossen hat.
                </td>
            </tr>
        </table>
        <br><br>
        <table class="table table-bordered">
            <tr>
                <td width="10%">Datum</td>
                <td width="10%">&bull;</td>
                <td width="10%">Vermieter</td>
                <td width="15%">&bull;</td>
                <td width="10%">Mieter</td>
                <td width="15%">&bull;</td>
            </tr>
        </table>
    </div>

    <div class="pagebreak"></div>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>Wohnungsgeberbestätigung</h2>
                <p><b>(§ 19 Abs. 3 Bundesmeldegesetz)</b></p>
            </div>
            <br><br>
            <b>1. Angaben zum Wohnungsgeber:</b>
            <table class="table table-bordered">
                <tr>
                    <td>
                        <div style="font-size:9pt;">Familienname, Vorname</div><?php echo $vertrag->vermieter; ?>
                    </td>
                    <td>
                        <div style="font-size:9pt;">Anschrift</div>
                    </td>

                </tr>
                <tr>
                    <td colspan="2">
                        <div style="font-size:9pt;">ggf. Name, Anschrift der vom Wohnungsgeber bevollmächtigten Person</div>
                    </td>
                </tr>
            </table>
            <br><br>
            <b>Angaben zum Eigentümer der Wohnung:</b>
            <p>(nur auszufüllen, wenn dieser nicht selbst Wohnungsgeber ist)</p>
            <table class="table table-bordered">
                <tr>
                    <td>
                        <div style="font-size:9pt;">Familienname, Vorname</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="font-size:9pt;">ggf. weitere Eigentümer: Familienname, Vorname</div>
                    </td>
                </tr>
            </table>
            <br>
            <input type="checkbox"> <b>Eigennutzung durch den Wohnungsgeber/Eigentümer</b>

            <br><br><b>2. Wohnung:</b>
            <table class="table table-bordered">
                <tr>
                    <td colspan="2">
                        <div style="font-size:9pt;">Anschrift</div><?php echo $vertrag->adresse; ?>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" checked> Einzug – Tag des Einzugs: <?php echo $vertrag->begin; ?></td>
                    <td><input type="checkbox" checked> Auszug – Tag des Auszugs: <?php echo $vertrag->ende; ?></td>

                </tr>
            </table>

            <br><b>3. Folgende Person/Personen ist/sind in die angegebene Wohnung ein- bzw. ausgezogen:</b><br>
            <table class="table table-bordered">
                <tr>
                    <td>
                        <div style="font-size:9pt;">Familienname, Vorname</div><?php echo $client->client_name; ?>
                    </td>
                    <td>
                        <div style="font-size:9pt;">Familienname, Vorname</div>
                    </td>

                </tr>
                <tr>
                    <td>
                        <div style="font-size:9pt;">Familienname, Vorname</div>
                    </td>
                    <td>
                        <div style="font-size:9pt;">Familienname, Vorname</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="font-size:9pt;">Familienname, Vorname</div>
                    </td>
                    <td>
                        <div style="font-size:9pt;">Familienname, Vorname</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="font-size:9pt;">Familienname, Vorname</div>
                    </td>
                    <td>
                        <div style="font-size:9pt;">Familienname, Vorname</div>
                    </td>
                </tr>
            </table>
            <br>
            <p><b>Ich bestätige mit meiner Unterschrift, dass die oben gemachten Angaben den Tatsachen
                    entsprechen.</b> Mir ist bekannt, dass es verboten ist, eine Wohnungsanschrift für eine Anmeldung
                anzubieten oder zur Verfügung zu stellen, wenn ein tatsächlicher Bezug der Wohnung weder stattfindet noch beabsichtigt ist. Ein Verstoß gegen dieses Verbot stellt eine Ordnungswidrigkeit dar
                und kann mit einer Geldbuße bis zu 50.000 Euro geahndet werden. Das Unterlassen einer Bestätigung des Einzugs sowie die falsche oder nicht rechtzeitige Bestätigung des Einzugs können als
                Ordnungswidrigkeiten mit Geldbußen bis zu 1.000 Euro geahndet werden.
            </p>
            <br><br>
            <table class="table">
                <tr>
                    <td width="50%">&#x2022;<div style="font-size:9pt;">Datum</div>
                    </td>
                    <td width="50%">&#x2022;<div style="font-size:9pt;text-decoration:overline;">Unterschrift des Wohnungsgebers oder der beauftragten Person</div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
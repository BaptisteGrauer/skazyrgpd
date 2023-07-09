<div class="wrap">
    <h1>Paramètres Tarteaucitron</h1>
    <h2>Base de données</h2>
    <form method="post" action="../wp-content/plugins/skazyrgpd/skazyrgpd-db-install.php">
        <input class="button"type="submit" value="Créer la base de donnée">
    </form>
    <h2>Général</h2>
    <form method="post" action="">
        <?php
            global $wpdb;
            include 'skazyrgpd-settings.php';
            $skazyrgpd_db = $wpdb->prefix . "skazyrgpd";
            $results = $wpdb->get_results("SELECT setting_name, setting_description, setting_value, setting_type, setting_select_possible_values FROM $skazyrgpd_db", ARRAY_N );
            foreach($results as $result){
                $settingName = $result[0];
                $settingDesc = $result[1];
                $settingVal = $result[2];
                $settingType = $result[3];
                $settingSelect = $result[4];
                var_dump($settingSelect);
                echo "<div>";
                if($result[3] == "select"){
                    echo 
                    "$settingDesc : <br><select name='$settingName'>";
                    //$settingSelect = eval($settingSelect);
                    foreach($settingSelect as $option){
                        echo "<option value='$option'>$option</option>";
                    }
                    echo "</select>";
                }
                else {
                    echo "$settingDesc : <br><input type='$settingType' name='$settingName'>";
                }
                echo "</div>";
            }
            echo $query; //affiche la requête SQL pour créer la base de données
        ?>
    </form>
    <ul>
        <?php
            foreach($SettingsTo as $desc => $setting){
                echo "<li>" . $desc . " : ". $setting ."</li>";
            }
        ?>
    </ul>
</div>
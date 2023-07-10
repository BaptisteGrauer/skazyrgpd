<div class="wrap">
    <h1>Paramètres Tarteaucitron</h1>
    <h2>Base de données</h2>
    <form method="post" action="../wp-content/plugins/skazyrgpd/skazyrgpd-db-install.php">
        <input class="button" type="submit" value="Créer la base de donnée">
    </form>
    <h2>Général</h2>
    <form method="post" action="">
        <?php
        global $wpdb;
        include 'skazyrgpd-settings.php';
        $skazyrgpd_db = $wpdb->prefix . "skazyrgpd";
        $results = $wpdb->get_results("SELECT setting_name, setting_description, setting_value, setting_type, setting_select_possible_values FROM $skazyrgpd_db", ARRAY_N);
        

        foreach ($results as $result) {
            $setting_name = $result[0];
            $setting_description = $result[1];
            $setting_value = $result[2];
            $setting_type = $result[3];
            $setting_select_possible_values = $result[4];
            if ($setting_type == "text") {
                echo "<label for='$setting_name'>$setting_description</label><br>";
                echo "<input type='text' name='$setting_name' value='$setting_value'><br>";
                }
            elseif ($setting_type == "color") {
                echo "<label for='$setting_name'>$setting_description</label><br>";
                echo "<input type='color' name='$setting_name' value='$setting_value'><br>";

            } else if ($setting_type == "select") {
                echo "<label for='$setting_name'>$setting_description</label><br>";
                echo "<select name='$setting_name'>";
                $setting_select_possible_values = explode(",", $setting_select_possible_values);
                $setting_select_possible_values = str_replace("'", "", $setting_select_possible_values);
                $setting_select_possible_values = str_replace("[", "", $setting_select_possible_values);
                $setting_select_possible_values = str_replace("]", "", $setting_select_possible_values);
                foreach ($setting_select_possible_values as $setting_select_possible_value) {
                    if ($setting_select_possible_value == $setting_value) {
                        echo "<option value='$setting_select_possible_value' selected>$setting_select_possible_value</option>";
                    } else {
                        echo "<option value='$setting_select_possible_value'>$setting_select_possible_value</option>";
                    }
                }
                echo "</select><br>";
            } else if ($setting_type == "textarea") {
                echo "<label for='$setting_name'>$setting_description</label><br>";
                echo "<textarea name='$setting_name'>$setting_value</textarea><br>";
            } else if ($setting_type == "checkbox") {
                echo "<label for='$setting_name'>$setting_description</label><br>";
                if ($setting_value == "true") {
                    echo "<input type='checkbox' name='$setting_name' value='true' checked><br>";
                } else {
                    echo "<input type='checkbox' name='$setting_name' value='true'><br>";
                }
            }
        }

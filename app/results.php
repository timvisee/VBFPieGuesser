<?php

use app\guess\Guess;
use app\guess\GuessManager;
use app\template\PageFooterBuilder;
use app\template\PageHeaderBuilder;

// Include the page top
require_once('top.php');

if(!isset($_GET['weight'])):
    ?>
    <div data-role="page" id="page-guess" data-unload="false">
        <?php PageHeaderBuilder::create("Resultaten")->setBackButton('index.php')->build(); ?>

        <div data-role="main" class="ui-content">
            <p>
                Vul het gewicht van de taart in om de resultaten te bekijken.<br />
            </p><br />

            <form method="GET" action="results.php">
                <label for="weight">Gewicht in gram:</label>
                <input name="weight" id="weight" value="<?=mt_rand(10, 4000); ?>" min="0" max="5000" step="0.1" data-highlight="true" type="range" data-popup-enabled="true">

                <input type="submit" value="Bekijk resultaten" class="ui-btn ui-icon-lock ui-btn-icon-right" />
            </form>
        </div>

        <?php
        // Build the footer and sidebar
        PageFooterBuilder::create()->build();
        ?>
    </div>
    <?php

else:
    // Get the weight
    $weight = (int) $_GET['weight'];

    ?>
    <div data-role="page" id="page-my-guesses">
        <?php
        // Construct the builder
        PageHeaderBuilder::create("Resultaten")->setBackButton('index.php')->build();
        ?>
        <div data-role="main" class="ui-content">

            <p>
                Hier onder zie je een overzicht met alle schattingen.<br>
                De schattingen die het dichtst in de buurt komen van het opgegeven gewicht staan boven aan in de lijst.<br>
                <br>
                <b>Gewicht:</b> <?=$weight; ?> gram
            </p>
            <br />

            <?php if(GuessManager::hasGuesses()): ?>
                <table data-role="table" data-mode="reflow" class="ui-body-d ui-shadow table-stripe ui-responsive" data-column-btn-theme="a" >
                    <thead>
                    <tr class="ui-bar-d">
                        <th>Naam</th>
                        <th>E-mail</th>
                        <th>Verschil</th>
                        <th>Schatting</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Get all guesses sorted by their difference
                    $guesses = GuessManager::getBestGuesses($weight);

                    foreach($guesses as $guess) {
                        // Make sure the instance type is valid
                        if(!($guess instanceof Guess))
                            continue;

                        // Get the guess weight
                        $guessWeight = $guess->getWeight();

                        // Calculate the guess difference
                        $guessDifference = abs($guessWeight - $weight);

                        // Print the guess in the table
                        echo '<tr><td>' . $guess->getFirstName() . ' ' . $guess->getLastName() . '</td>';
                        echo '<td>' . $guess->getMail() . '</td>';
                        echo '<td>' . $guessDifference . ' gram</td>';
                        echo '<td>' . $guessWeight . ' gram</td></tr>';
                    }
                    ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p><i>Nog geen schattingen beschikbaar...</i></p>
            <?php endif;
            ?>
        </div>

        <?php PageFooterBuilder::create()->build(); ?>
    </div>
    <?php

endif;

// Include the page bottom
require_once('bottom.php');

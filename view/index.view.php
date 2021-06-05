<!doctype html>
<html lang="lt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="view/css/style.css" type="text/css">
        <title>Formos</title>
    </head>
    <body>
    <div class="container">
        <section>
    <!--        paspaudziame mygtuka-->
        <?php if (isset($_POST['send'])): ?>
    <!--    validuojame duomenis-->
        <?php validate($_POST);?>
    <!--    jeigu klaidu nera, masyvas yra tuscias, issaugome duomenis tekstiniame faile-->
        <?php if(empty($validation)){
            storeData();
            }
            ?>
            <?php storeData(); ?>
            <?php endif; ?>
        </section>
        <?php
    //    jeigu masyve yra klaidu, tada jas atvaizduojame
        if(isset($validation)){
            foreach ($validation as $error){
                echo $error;
            }
        }
        ?>


        <form method="post">
            <div class="form-group">
                <label for="name">Vardas:</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
                <small id="nameHelp" class="form-text text-muted">Įveskite vardą</small>
            </div>
            <div class="form-group">
                <label for="lastname">Pavardė:</label>
                <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastNameHelp">
                <small id="lastNameHelp" class="form-text text-muted">Įveskite pavardę</small>
            </div>
            <div class="form-group">
                <label for="InputEmail1">El. paštas:</label>
                <input type="email" class="form-control" id="InputEmail1" name="email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Jūsų el. pašto adresas</small>
            </div>
            <div class="form-group">
                <select class="form-control" id="departmentsselect" name="department">
                    <option value="" disabled selected>--Pasirinkite departamentą</option>
                    <?php for ($i = 0; $i < count($departments); $i++): ?>
                        <option value="<?=$departments[$i]; ?>"><?= ucfirst($departments[$i]); ?></option>
<!--                    pirmas $departments yra tai, ka perduodame, antras - tai ka atvaizduojame vartotojui html'e; ucfirst - is didziuju raidziu; ?= yra isvedimui, tas pats, kaip echo-->
                    <?php endfor; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Žinutė:</label>
                <textarea class="form-control" id="message" rows="3" name="message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="send">Pateikti</button>
        </form>

    <h2>Duomenys</h2>
    <table class="table table-bordered">
        <?php
        foreach(showData() as $message):?>
        <tr>
            <td><?=$message;?></td>
        </tr>
        <?php endforeach;?>
    </table>
    </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    </body>
</html>
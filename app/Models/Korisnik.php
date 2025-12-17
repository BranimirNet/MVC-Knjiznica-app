<?php

namespace App\Models;

use Core\Database;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class Korisnik{

    public static function create(array $data): string{

        $db = Database::getInstance();
        $aktivacijskiKljuc = Uuid::uuid4()->toString();

        $sql="INSERT INTO Korisnik
        (korime,sifra,sifra_p,ime,prezime,email,idTipKorisnik,statusrn,aktivacijski_kljuc,datum_kreiranja)
        values
        (:korime, :sifra, :sifra_p, :ime, :prezime, :email, :tip, :status, :kljuc, :datum)";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            ':korime'=>$data['korime'],
            ':sifra'=>password_hash($data["sifra"],PASSWORD_DEFAULT),
            ':sifra_p'=>password_hash($data["sifra"],PASSWORD_DEFAULT),
            ':email' => $data['email'],
            ':ime' => $data['ime'],
            ':prezime' => $data['prezime'],
            ':tip'=>2,
            ':status'=>0,
            ':kljuc'=>$aktivacijskiKljuc,
            ':datum' => Carbon::now()->toDateTimeString()
        ]);

        return $aktivacijskiKljuc;
    }

    public static function activate(string $key): bool{
        $db = Database::getInstance();

        $sql="UPDATE Korisnik set statusrn = 1, aktivacijski_kljuc = NULL
        WHERE aktivacijski_kljuc= :key";

        $stmt=$db->prepare($sql);
        $stmt->execute([':key'=>$key]);

        return $stmt->rowCount()===1;
    }
}


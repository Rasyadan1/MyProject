import java.util.Scanner;

public class Segitiga {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        System.out.print("Masukan alas: ");
        int alas = scanner.nextInt();

        System.out.print("Masukan tinggi: ");
        int tinggi = scanner.nextInt();

        double hasil = 0.5 * alas * tinggi;

        System.out.println("Luas segitiga: " + hasil);
    }
}

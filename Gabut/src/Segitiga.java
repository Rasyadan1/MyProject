import java.util.Scanner;

public class Segitiga {
    public static void main(String[] args) {
        try (Scanner scanner = new Scanner(System.in)) {
            System.out.print("Masukan alas: ");
            double alas = scanner.nextDouble();

            System.out.print("Masukan tinggi: ");
            double tinggi = scanner.nextDouble();

            double hasil = 0.5 * alas * tinggi;

            System.out.println("Luas segitiga: " + hasil);
        }
    }
}

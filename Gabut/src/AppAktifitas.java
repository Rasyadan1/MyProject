import java.util.ArrayList;
import java.util.Scanner;

public class AppAktifitas {
    private static final ArrayList<String> tasks = new ArrayList<>();
    public static void main(String[] args) {
        
        try (Scanner scanner = new Scanner(System.in)) {
            boolean add = true;
            
            System.out.println("Masukan Username : ");
            String username = scanner.next();
            
            while(add) {
                System.out.println("1. Username");
                System.out.println("2. Aktivitas Pengguna");
                System.out.println("3. Tambahkan Aktifitas Pengguna");
                System.out.println("4. Exit");
                System.out.println("Masukan Opsi");
                
                int pilihan = scanner.nextInt();
                scanner.nextLine();
                
                switch (pilihan) {
                    case 1:
                        dataUsername(username);
                    case 2:
                        aktivitasPengguna(username);
                        break;
                    case 3:
                        tambahkanAktifitas(scanner);
                    case 4:
                        break;
                    default:
                        System.out.println("Tolong masukan pilihan yang benar");
                }
            }
        }
    }
    
    public static void dataUsername(String username) {
        System.out.println("Username = " + username);
    }
    public  static void aktivitasPengguna(String username) {
        if (tasks.isEmpty()){
            System.out.println("Belum ada aktifitas");
        } else {
            System.out.println("Data aktifitas pengguna : " + username);
            for (String task : tasks) {
                System.out.println("-" + task);
            }
        }
    }
    private static void tambahkanAktifitas(Scanner scanner) {
        System.out.println("Tambahkan Aktifitas: ");
        String aktifitas = scanner.nextLine();
        tasks.add(aktifitas);
        System.out.println("Aktifitas berhasil ditambahkan");
    }
}

import java.awt.BorderLayout;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.JTextArea;
import javax.swing.JTextField;

public class ChatApps {
    private final JButton b;
    private final JTextField t;
    private final JTextArea ta;
    private final JFrame f;
    private final JPanel p;

    public ChatApps() {
        f = new JFrame("WeTalk");
        b = new JButton("Send");
        t = new JTextField(50);
        ta = new JTextArea();
        ta.setEditable(false); // Make text area read-only
        p = new JPanel();
    }
    
    public void launchFrame() {
        p.setLayout(new GridLayout(1, 2));
        p.add(t);
        p.add(b);

        f.add(ta, BorderLayout.CENTER);
        f.add(p, BorderLayout.SOUTH);
        f.setSize(500, 500);
        f.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        f.setVisible(true);

        // Add action listener to the button
        b.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                String inputText = t.getText().trim();
                if (!inputText.isEmpty()) {
                    ta.append("You: " + inputText + "\n");
                    t.setText("");
                }
            }
        });

        // Add action listener to text field (pressing Enter to send message)
        t.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                b.doClick(); // Simulate button click
            }
        });
    }

    public static void main(String[] args) {
        ChatApps ca = new ChatApps();
        ca.launchFrame();
    }
}

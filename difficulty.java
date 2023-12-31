package tp_ihm;
import javax.swing.*;
import java.awt.*;
import java.awt.event.*;


public class difficulty extends JFrame {
public difficulty() {
           JFrame frame = new JFrame();
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setSize(800, 800);
        frame.setLocationRelativeTo(null);

        JPanel panel = new JPanel() {
            @Override
            protected void paintComponent(Graphics g) {
                super.paintComponent(g);
                Image img = new ImageIcon("C:\\\\Users\\\\Lenovo\\\\Pictures\\\\98947d4f4d1c724565d569c6dc6e1b7f.jpg").getImage();
                g.drawImage(img, 0, 0, this.getWidth(), this.getHeight(), this);
            }
        };

        panel.setLayout(null);
        
        JLabel lab = new JLabel("SPACE QUIZ ?!");
        lab.setBounds(150, 50, 500, 300);
        lab.setFont(new Font("Arial", Font.PLAIN, 60));
        lab.setForeground(Color.white);
        panel.add(lab);
        
        Icon img = new ImageIcon("C:\\Users\\Lenovo\\Desktop\\Capture d’écran 2023-12-31 074101.png");
        JButton easyButton = new JButton(img);
        easyButton.setBounds(200, 400, 330,80);
        easyButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
            	QuizFrame game = new QuizFrame();
                game.setVisible(true);
            }
        });
        panel.add(easyButton);
        
        Icon img1 = new ImageIcon("C:\\Users\\Lenovo\\Desktop\\Capture d’écran 2023-12-31 074634.png");
        JButton hardButton = new JButton(img1);
        hardButton.setBounds(200, 500, 330,80);
        hardButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
            	QuizFrameD game1 = new QuizFrameD();
                game1.setVisible(true);
            
            	
            }
        });
        
        Icon img2 = new ImageIcon("C:\\Users\\Lenovo\\Desktop\\Capture d’écran 2023-12-31 071753.png");
        JButton returnButton = new JButton(img2);
        returnButton.setBounds(50, 50, 40,50);
        returnButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
            	test game2 = new test();
            
            	
            }
        });
        
        panel.add(returnButton);
       panel.add(hardButton);

        frame.add(panel);
        frame.setVisible(true);
        
         
        
    }
 
public static void main(String[] args) {
	SwingUtilities.invokeLater(new Runnable() {
        public void run() {
            new difficulty().setVisible(true);
        }
    });
}
}

package tp_ihm;
import javax.swing.*;


import java.awt.Graphics;
import java.awt.Image;
import java.awt.Dimension;
import java.awt.Font;
import java.awt.Color;
import java.awt.Component;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.Random;

public class test {
	
	public test() {
		JFrame f= new JFrame();
		f.setSize(800,800);
		f.setTitle("SPACE Maths");
		f.setLocationRelativeTo(null);
		
		JPanel p = new JPanel() {
            @Override
            protected void paintComponent(Graphics g) {
                super.paintComponent(g);
                Image img = new ImageIcon("C:\\Users\\Lenovo\\Pictures\\98947d4f4d1c724565d569c6dc6e1b7f.jpg").getImage();
                g.drawImage(img, 0, 0, this.getWidth(), this.getHeight(), this);
            }
        };
       
        p.setLayout(null);
        
        JLabel lab = new JLabel("SPACE MATHS ?!");
        lab.setBounds(150, 50, 500, 300);
        lab.setFont(new Font("Arial", Font.PLAIN, 60));
        lab.setForeground(Color.white);
        
        Icon img = new ImageIcon("C:\\Users\\Lenovo\\Pictures\\4ae93adc07cf5046a4a301c9c80ce99c.jpg");
        JButton startButton = new JButton(img);
        startButton.setBounds(400, 400, 300, 100);
        startButton.setBorder(null);
        startButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                // Créer un nouvel objet de la classe projet_ihm et l'afficher
                difficulty game = new difficulty();
                game.setVisible(true);
            }
        });
        p.add(lab);
        p.add(startButton);
        
        
        f.add(p);
        f.setVisible(true);
	}

public static void main (String [] args) {
	SwingUtilities.invokeLater(new Runnable() {
        public void run() {
            new test();
        }
    });
}

}

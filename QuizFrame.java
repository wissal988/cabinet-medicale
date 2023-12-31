package tp_ihm;
import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.util.*;

public class QuizFrame extends JFrame {
	private Random rand;
    private int numQuestions = 10;
    private int currentQuestion = 0;
    private int correctAnswers = 0;
    private JLabel questionLabel;
    private JTextField answerField;
    private JButton submitButton;
    private JLabel resultLabel;
	public QuizFrame() {
		rand = new Random();
        JFrame frame = new JFrame();
     frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
     frame.setSize(800, 800);
     frame.setLocationRelativeTo(null);

     JPanel panel = new JPanel() {
         @Override
         protected void paintComponent(Graphics g) {
             super.paintComponent(g);
             Image img = new ImageIcon("C:\\Users\\Lenovo\\Pictures\\0c821fc02a15e3d9d2bc057f455be0a1.jpg").getImage();
             g.drawImage(img, 0, 0, this.getWidth(), this.getHeight(), this);
         }
     };
     
     JLabel lab = new JLabel("SPACE QUIZ ?!");
     lab.setBounds(150, 50, 500, 300);
     lab.setFont(new Font("Arial", Font.PLAIN, 60));
     lab.setForeground(Color.white);
     panel.add(lab);
     
     Icon img2 = new ImageIcon("C:\\Users\\Lenovo\\Desktop\\Capture d’écran 2023-12-31 071753.png");
     JButton returnButton = new JButton(img2);
     returnButton.setBounds(50, 50, 40,50);
     returnButton.addActionListener(new ActionListener() {
         public void actionPerformed(ActionEvent e) {
         	difficulty game2 = new difficulty();
         	game2.setVisible(true);
         
         	
         }
     });
     
     panel.add(returnButton);
     
     
     panel.setLayout(null);
     questionLabel = new JLabel(); // Initialize the questionLabel
     questionLabel.setBounds(300, 400, 300, 60);
     questionLabel.setFont(new Font("Arial", Font.PLAIN, 30));
     questionLabel.setForeground(Color.white);
     
     
     
     answerField = new JTextField(); // Initialize the answerField
     answerField.setBounds(230, 500, 200, 40);
     
     Icon img1 = new ImageIcon("C:\\Users\\Lenovo\\Desktop\\Capture d’écran 2023-12-31 054934.png");
     submitButton = new JButton(img1);
     submitButton.setBounds(470, 500, 90, 40);
     submitButton.addActionListener(new ActionListener() {
         public void actionPerformed(ActionEvent e) {
             checkAnswer();
         }
     });
     
     resultLabel = new JLabel();
     resultLabel.setBounds(200, 600, 500, 60);
     resultLabel.setFont(new Font("Arial", Font.PLAIN, 30));
     resultLabel.setForeground(Color.white);
     
     
     panel.add(questionLabel);
     panel.add(answerField); // Add the answerField to the panel
     panel.add(submitButton); // Add the submitButton to the panel
     panel.add(resultLabel);
     
     
     frame.add(panel);
     frame.setVisible(true);
     generateQuestion();
	}
	private void generateQuestion() {
    if (currentQuestion < numQuestions) {  
     if (currentQuestion < numQuestions) {
     	
         int a = rand.nextInt(10);
         int b = rand.nextInt(10);
         int operator = rand.nextInt(2);

         int result;
         String operatorSymbol;

         switch (operator) {
         case 0:
             result = a + b;
             operatorSymbol = "+";
             break;
         default :
         	if(a>b) {
                 result = a - b;
                 operatorSymbol = "-";
             } else {
                 result = b - a;
                 operatorSymbol = "-";
             }
             break;
     }
         if(a<b){
         questionLabel.setText("What is " + b + " " + operatorSymbol + " " + a + " ?");
         }else {
         questionLabel.setText("What is " + a + " " + operatorSymbol + " " + b + " ?");
         }
         
         answerField.setText("");
         answerField.requestFocus();
         currentQuestion++;
     } } else {
         displayResult();
     }}
	
	private void checkAnswer() {
        int userAnswer;
        try {
            userAnswer = Integer.parseInt(answerField.getText());
        } catch (NumberFormatException e) {
            JOptionPane.showMessageDialog(this, "Please enter a valid number.");
            return;
        }

        String[] questionParts = questionLabel.getText().split(" ");
        int a = Integer.parseInt(questionParts[2]);
        String operatorSymbol = questionParts[3];
        int b = Integer.parseInt(questionParts[4]);

        int result;
        switch (operatorSymbol) {
            case "+":
                result = a + b;
                break;
            case "-":
                if (a > b) {
                    result = a - b;
                } else {
                    result = b - a;
                }
                break;
            default:
                result = a * b;
                break;
        }

        if (userAnswer == result) {
            resultLabel.setText("Correct! You are GENIUS");
            correctAnswers++;
        } else {
            resultLabel.setText("Incorrect. The answer is " + result);
        }
        generateQuestion();
	}
	 private void displayResult() {
	        JOptionPane.showMessageDialog(this, "You got " + correctAnswers + " out of " + numQuestions + " questions correct.");
	        System.exit(0);}
     
	


public static void main(String[] args) {
	SwingUtilities.invokeLater(new Runnable() {
        public void run() {
            new QuizFrame().setVisible(true);
        }
    });
}
}

package tp_ihm;


import javax.swing.*;

import java.awt.BorderLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.Random;


public class projet_ihm extends JFrame {
	

    private JLabel questionLabel;
    private JTextField answerField;
    private JButton submitButton;
    private boolean isEasy = false;

    private Random rand;
    private int numQuestions = 10;
    private int correctAnswers = 0;
    private int currentQuestion = 0;
    private JLabel resultLabel;

    
    
    public projet_ihm() {
    	
    	super("Math Game");
    	
    	
    	
    	resultLabel = new JLabel(); // Initialize the result label
        resultLabel.setBounds(20, 100, 300, 30);
        add(resultLabel);
    	
    	
        
        

        rand = new Random();
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setSize(400, 200);
        setLocationRelativeTo(null);
        setLayout(null);

        questionLabel = new JLabel();
        questionLabel.setBounds(20, 20, 300, 30);
        add(questionLabel);

        answerField = new JTextField();
        answerField.setBounds(20, 60, 100, 30);
        add(answerField);

        submitButton = new JButton("Submit");
        submitButton.setBounds(130, 60, 80, 30);
        add(submitButton);

        submitButton.addActionListener(new ActionListener() {
            
            public void actionPerformed(ActionEvent e) {
                checkAnswer();
            }
        });

        askDifficultyLevel();
        
        
    }
    
    
    /////ask a difficult level
    private void askDifficultyLevel() {
        Object[] options = {"Easy", "Hard"};
        int choice = JOptionPane.showOptionDialog(
                this,
                "Select Difficulty Level",
                "Difficulty",
                JOptionPane.DEFAULT_OPTION,
                JOptionPane.QUESTION_MESSAGE,
                null,
                options,
                options[0]);

        if (choice == JOptionPane.CLOSED_OPTION) {
            System.exit(0); // Close the program if user cancels the selection
        } else if (choice == 0) {
            // Easy level selected
            numQuestions = 5; // Set number of questions
            askEasyQuestion(); // Start asking easy questions
            isEasy = true;
            
        } else if (choice == 1) {
            // Hard level selected
            numQuestions = 5; // You can change the number of questions for the hard level if needed
            askHardQuestion(); // Start asking hard questions
            
        }
    }
    
    
    
    
    //////hard questions

    private void askHardQuestion() {
        if (currentQuestion < numQuestions) {


        	
        	
        	
        	
            int a = rand.nextInt(10);
            int b = rand.nextInt(10);
            int operator = rand.nextInt(1); // Only multiplication for hard level

            int result;
            String operatorSymbol;

            result = a * b;
            operatorSymbol = "*";

            questionLabel.setText("What is " + a + " " + operatorSymbol + " " + b + " ?");
            answerField.setText("");
            answerField.requestFocus();
            currentQuestion++;
        } else {
            displayResult();
        }
    }
    
    
    
    
    
    
    
    
    /////easy questions
    private void askEasyQuestion() {
    	
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
        } else {
            displayResult();
        }
    }

    
    
    
    
    //////chek answers////
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
            resultLabel.setText("Correct!");
            correctAnswers++;
        } else {
            resultLabel.setText("Incorrect. The answer is " + result);
        }

        // After checking the answer, proceed to ask the next question
        
        if(isEasy == true) {
        	askEasyQuestion();
        }else {
        	askHardQuestion();	
        }  
        
    }
    
    
    
    
    private void displayResult() {
        JOptionPane.showMessageDialog(this, "You got " + correctAnswers + " out of " + numQuestions + " questions correct.");
        System.exit(0);
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(new Runnable() {
            
            public void run() {
                new projet_ihm().setVisible(true);
            }
        });
        
        
        
    }
}


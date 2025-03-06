async function piDigitCheck() {
    try {
      // 1. Get audio stream from microphone
      const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
  
      // 2. Initialize SpeechRecognition API
      const recognition = new webkitSpeechRecognition() || new SpeechRecognition();
      recognition.lang = 'en-US'; // Set language to English (US)
      recognition.interimResults = false; // Only get final results
      recognition.maxAlternatives = 1; // Get the best matching transcript
  
      // 3. Store the first 100 digits of pi
      const piDigits = "3.1415926535897932384626433832795028841971693993751058209749445923078164062862089986280348253421170679";
  
      // 4. Initialize variables to track progress
      let digitIndex = 0; // Current position in piDigits
      let spokenDigits = ""; // String to store the spoken digits
      let isCorrect = true; // Flag to track if the digits are correct
  
      // 5. Event handler for speech recognition results
      recognition.onresult = (event) => {
        const result = event.results[0][0].transcript.trim();
        const spokenNumbers = result.replace(/\D/g, '');
      
        if (spokenNumbers) {
          for (const digit of spokenNumbers) {
            if (digitIndex < piDigits.length && digit === piDigits[digitIndex]) {
              spokenDigits += digit;
              digitIndex++;
            } else {
              isCorrect = false;
              recognition.stop();
              stream.getTracks().forEach(track => track.stop());
              console.log("Incorrect digit! Spoken:", spokenDigits + digit); // Include the incorrect digit
              document.getElementById("speechoutput").innerHTML = "Incorrect digit! Spoken: " + spokenDigits + digit; //Include the incorrect digit
              return;
            }
          }
        }
      };
  
      // 6. Event handler for speech recognition errors
      recognition.onerror = (event) => {
        console.error("Speech recognition error:", event.error);
      };
  
      // 7. Event handler for speech recognition end
      recognition.onend = () => {
        // a. Check if all digits were correct
        if (isCorrect) {
          // b. If correct, display the spoken digits
          console.log("Finished! Spoken:", spokenDigits);
          document.getElementById("speechoutput").innerHTML = "Finished! Spoken: " + spokenDigits;
        }
      };
  
      // 8. Start speech recognition
      recognition.start();
      console.log("Speech recognition started...");
  
    } catch (error) {
      console.error("Error:", error);
    }
  }

  piDigitCheck();
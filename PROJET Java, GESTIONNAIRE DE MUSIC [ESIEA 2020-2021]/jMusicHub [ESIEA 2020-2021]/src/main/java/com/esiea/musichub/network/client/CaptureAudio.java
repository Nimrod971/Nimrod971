package com.esiea.musichub.network.client;

import javax.sound.sampled.*;
import java.io.File;

public class CaptureAudio {

    protected File sample = new File("src/main/resources/sounds/Eminem_Lose_Yourself.wav");

    public CaptureAudio() {
        SourceDataLine soundLine = null;
        int BUFFER_SIZE = 1024;

        // Set up an audio input stream piped from the sound file.
        try {

            AudioInputStream audioInputStream = AudioSystem.getAudioInputStream(sample);
            AudioFormat audioFormat = audioInputStream.getFormat();
            DataLine.Info info = new DataLine.Info(SourceDataLine.class, audioFormat);

//Soundline ist noch nicht angelegt -> angelegen.
            if (soundLine == null) {
                soundLine = (SourceDataLine) AudioSystem.getLine(info);
                soundLine.open(audioFormat);
                soundLine.start();
            }
            System.out.println("Started");
            Thread.sleep(2000);

            System.out.println("Playing");
            int nBytesRead = 0;
            byte[] sampledData = new byte[BUFFER_SIZE];
            while (nBytesRead != -1) {
                nBytesRead = audioInputStream.read(sampledData, 0, sampledData.length);
                if (nBytesRead >= 0) {
                    soundLine.write(sampledData, 0, nBytesRead);
                }
            }
            Thread.sleep(2000);
            System.out.println("Draining");
            soundLine.drain();
            Thread.sleep(2000);
            System.out.println("Closing");
            soundLine.close();
        } catch (Exception e) {
            e.printStackTrace();
        }

    }
}

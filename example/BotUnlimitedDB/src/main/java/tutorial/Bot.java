package tutorial;

import org.telegram.telegrambots.bots.TelegramLongPollingBot;
import org.telegram.telegrambots.meta.api.objects.Update;

import java.net.URI;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;

public class Bot extends TelegramLongPollingBot {
    @Override
    public String getBotUsername() {
        return "UnlimitedDB.net";
    }

    @Override
    public String getBotToken() {
        return "7717265706:AAH5chf4Ae3vsFSt7158K-RFWdh9BudnnQc";
    }

    @Override
    public void onUpdateReceived(Update update) {
        if(update.getMessage().isCommand()) {
            switch(update.getMessage().getText()) {
                case "/scan":
                    executeScanCommand(update.getMessage().getFrom().getUserName());
                    break;
            }
        }
    }

    private void executeScanCommand(String userName) {
        // Logic to execute when /scan command is received
        System.out.println("Scan command received by " + userName);

        HttpClient client = HttpClient.newHttpClient();

        HttpRequest request = HttpRequest.newBuilder()
                .uri(URI.create("https://www.unlimiteddb.net/update"))
                .GET()
                .build();

        // Fire and forget - lancia la richiesta e vai avanti
        client.sendAsync(request, HttpResponse.BodyHandlers.discarding());
    }
}

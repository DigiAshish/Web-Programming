class ArticlesController < ApplicationController
   http_basic_authenticate_with name: "admin", password: "admin", except: [:index, :show]
    def new
      @article = Article.new
    end
    def edit
      @article = Article.find(params[:id])
    end
    def create
      @article = Article.new(params.require(:article).permit(:title, :text))
      
      if @article.save
          redirect_to @article
        else
          render 'new'
        end
    end
    def update
      @article = Article.find(params[:id])
      @article.update(params.require(:article).permit(:title, :text))
        redirect_to @article
    end
    def destroy
       @article = Article.find(params[:id])
       @article.destroy
 
       redirect_to articles_path
     end
    def show
        @article = Article.find(params[:id])
     end
     def index
         @articles = Article.all
     end
end
